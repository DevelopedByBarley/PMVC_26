<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Services\RegistrationService;
use Core\Language;
use Core\Log;
use Core\RateLimiter;
use Core\Session;
use Core\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Publikus regisztráció: a landing oldal #register formja postol ide.
 */
class RegistrationController extends Controller
{
    /** A form a `csrf('registration')` tokent használja. */
    protected string $csrfTokenId = 'registration';

    private RegistrationService $registrations;

    public function __construct()
    {
        parent::__construct();

        $this->registrations = new RegistrationService();
    }

    public function store(): Response
    {
        $language = $this->language();
        $limiter  = new RateLimiter(
            maxAttempts: (int) config('registration.throttle.max_attempts', 5),
            decaySeconds: (int) config('registration.throttle.decay_seconds', 900)
        );

        if ($limiter->isBlocked('registration')) {
            $minutes = (int) ceil($limiter->availableIn('registration') / 60);

            $this->toast('danger', $language === 'en'
                ? "Too many attempts. Please try again in {$minutes} minutes."
                : "Túl sok kísérlet. Kérjük, próbálja újra {$minutes} perc múlva.");

            return $this->backToForm();
        }

        $data = [
            'type'    => (string) ($_POST['type'] ?? ''),
            'name'    => trim((string) ($_POST['name'] ?? '')),
            'email'   => strtolower(trim((string) ($_POST['email'] ?? ''))),
            'company' => trim((string) ($_POST['company'] ?? '')),
            'phone'   => trim((string) ($_POST['phone'] ?? '')),
            'mode'    => (string) ($_POST['mode'] ?? ''),
            'gdpr'    => isset($_POST['gdpr']) ? '1' : '',
        ];

        try {
            $this->validate($data, $language);

            $registration = $this->registrations->submit([
                'type'     => $data['type'],
                'name'     => $data['name'],
                'email'    => $data['email'],
                'company'  => $data['company'],
                'phone'    => $data['phone'],
                'mode'     => $data['mode'],
                'language' => $language,
            ]);

            $limiter->attempt('registration');
            Session::unset('old');

            return $this->redirect('/registration/' . $registration->token);
        } catch (ValidationException $e) {
            $limiter->attempt('registration');

            Session::flash('errors', $e->errors);
            Session::flash('old', $e->old);

            $this->toast('danger', $language === 'en'
                ? 'Please check the highlighted fields.'
                : 'Kérjük, ellenőrizze a megjelölt mezőket.');

            return $this->backToForm();
        } catch (Throwable $e) {
            Log::error('Regisztráció mentése sikertelen: ' . $e->getMessage());

            $this->toast('danger', $language === 'en'
                ? 'Something went wrong. Please try again later.'
                : 'Váratlan hiba történt. Kérjük, próbálja újra később.');

            return $this->backToForm();
        }
    }

    /** Visszaigazoló oldal a beküldés után (a token a linkben). */
    public function success(string $token): Response
    {
        $registration = Registration::where('token', $token)->first();

        if ($registration === null) {
            abort(404);
        }

        $language = $this->language();
        $lang     = Language::load('registration', $language);
        $t        = $lang['success'];

        return $this->view('pages.registration.success', [
            'title'       => $lang['meta']['title'],
            't'           => $t,
            'event'       => (array) config('event'),
            'reference'   => (string) $registration->reference,
            'statusLabel' => (string) ($t['statuses'][$registration->status] ?? $registration->status),
            'rows'        => $this->summaryRows($registration, $t, $language),
        ]);
    }

    /**
     * A visszaigazoló oldalon megjelenő adatpárok.
     *
     * @param array<string,mixed> $t
     * @return list<array{label:string,value:string}>
     */
    private function summaryRows(Registration $registration, array $t, string $language): array
    {
        $labels = $t['labels'];

        return [
            ['label' => $labels['type'],      'value' => $registration->typeLabel($language)],
            ['label' => $labels['name'],      'value' => (string) $registration->name],
            ['label' => $labels['email'],     'value' => (string) $registration->email],
            ['label' => $labels['company'],   'value' => (string) $registration->company],
            ['label' => $labels['phone'],     'value' => (string) $registration->phone],
            ['label' => $labels['mode'],      'value' => $registration->modeLabel($language)],
            ['label' => $labels['status'],    'value' => (string) ($t['statuses'][$registration->status] ?? '')],
            ['label' => $labels['submitted'], 'value' => (string) $registration->created_at],
        ];
    }

    /* ------------------------------------------------------------------ */
    /* Belső                                                              */
    /* ------------------------------------------------------------------ */

    /**
     * @param array<string,mixed> $data
     * @throws ValidationException
     */
    private function validate(array $data, string $language): void
    {
        $factory = validator();
        $factory->getTranslator()->setLocale($language);

        $validator = $factory->make($data, [
            'type'    => 'required|in:' . implode(',', Registration::TYPES),
            'name'    => 'required|min:3|max:150',
            'email'   => 'required|email|max:190',
            'company' => 'required|min:2|max:190',
            'phone'   => 'required|min:6|max:40',
            'mode'    => 'required|in:' . implode(',', Registration::MODES),
            'gdpr'    => 'accepted',
        ]);

        $errors = $validator->fails() ? $validator->errors()->toArray() : [];

        // A típusonként zárható regisztráció ellenőrzése.
        if ($errors === [] && !$this->registrations->isOpen($data['type'])) {
            $errors['type'] = [$language === 'en'
                ? 'This registration type is currently closed.'
                : 'Ez a regisztrációs típus jelenleg zárva van.'];
        }

        // Ugyanazzal az e-maillel ne legyen dupla jelentkezés.
        if (!isset($errors['email']) && $this->registrations->hasActiveRegistration($data['email'])) {
            $errors['email'] = [$language === 'en'
                ? 'A registration with this email address already exists.'
                : 'Ezzel az e-mail címmel már érkezett regisztráció.'];
        }

        if ($errors !== []) {
            ValidationException::throw($errors, [
                'type'    => $data['type'],
                'name'    => $data['name'],
                'email'   => $data['email'],
                'company' => $data['company'],
                'phone'   => $data['phone'],
                'mode'    => $data['mode'],
            ]);
        }
    }

    private function language(): string
    {
        return Language::get() === 'hu' ? 'hu' : 'en';
    }

    /** Vissza a landing oldal regisztrációs szekciójához. */
    private function backToForm(): Response
    {
        return $this->redirect('/#register');
    }
}
