<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Registration;
use Core\Language;
use Core\Session;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $lang = Language::current();
        $t    = Language::load('home', $lang);

        return $this->view('pages.home', [
            'title'    => $t['meta']['title'],
            'lang'     => $lang,
            't'        => $t,
            'event'    => (array) config('event'),
            'regTypes' => $this->registrationTypes($t),
            'errors'   => (array) Session::get('errors', []),
            'scripts'  => ['/resources/js/home.js'],
        ]);
    }

    /**
     * A regisztrációs típusok a formhoz: felirat, nyitva van-e, elő van-e választva.
     *
     * @param array<string,mixed> $t
     * @return list<array{value:string,label:string,open:bool,checked:bool}>
     */
    private function registrationTypes(array $t): array
    {
        $labels = [
            Registration::TYPE_ATTENDEE => $t['form']['attendee'],
            Registration::TYPE_SPEAKER  => $t['form']['speaker'],
        ];

        $types = [];
        $selected = (string) oldValue('type');

        foreach ($labels as $value => $label) {
            $open = (bool) config('registration.open.' . $value, true);

            $types[] = [
                'value'   => $value,
                'label'   => $label,
                'open'    => $open,
                // Alapból egyik sincs bejelölve: a választás kötelező, de tudatos.
                'checked' => $open && $selected === $value,
            ];
        }

        return $types;
    }
}
