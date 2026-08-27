<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Services\RegistrationService;
use Symfony\Component\HttpFoundation\Response;

/**
 * Regisztrációk kezelése az admin felületen: lista, szűrés, részletek,
 * elfogadás / elutasítás, visszaállítás, belső megjegyzés, CSV export.
 */
class RegistrationController extends Controller
{
    private const PER_PAGE = 20;

    private const STATUS_LABELS = [
        Registration::STATUS_PENDING  => 'Elbírálásra vár',
        Registration::STATUS_APPROVED => 'Elfogadva',
        Registration::STATUS_REJECTED => 'Elutasítva',
    ];

    private const TYPE_LABELS = [
        Registration::TYPE_ATTENDEE => 'Résztvevő',
        Registration::TYPE_SPEAKER  => 'Előadó',
    ];

    private const MODE_LABELS = [
        Registration::MODE_ONLINE    => 'Online',
        Registration::MODE_IN_PERSON => 'Személyesen',
    ];

    private RegistrationService $registrations;

    public function __construct()
    {
        parent::__construct();

        $this->registrations = new RegistrationService();
    }

    /* ------------------------------------------------------------------ */
    /* Lista + részletek                                                  */
    /* ------------------------------------------------------------------ */

    public function index(): Response
    {
        $filters = $this->filters();

        $paginator = Registration::query()
            ->status($filters['status'])
            ->type($filters['type'])
            ->mode($filters['mode'])
            ->search($filters['q'])
            ->orderByDesc('id')
            ->paginate(self::PER_PAGE)
            ->appends(array_filter($filters, static fn ($value): bool => $value !== null && $value !== ''));

        $stats = $this->registrations->stats();

        return $this->view('pages.admin.registrations.index', [
            'title'         => 'Regisztrációk',
            'registrations' => $paginator,
            'filters'       => $filters,
            'stats'         => $stats,
            'statCards'     => $this->statCards($stats, $filters),
            'statusOptions' => ['' => 'Mind'] + self::STATUS_LABELS,
            'typeOptions'   => ['' => 'Mind'] + self::TYPE_LABELS,
            'modeOptions'   => ['' => 'Mind'] + self::MODE_LABELS,
            'exportUrl'     => '/admin/registrations/export' . $this->filterQuery($filters),
        ], 'layouts.admin-layout');
    }

    public function show(string $id): Response
    {
        $registration = $this->findOrFail($id);

        return $this->view('pages.admin.registrations.show', [
            'title'        => 'Regisztráció – ' . $registration->reference,
            'registration' => $registration,
            'events'       => $registration->events()->with('admin')->get(),
            'rows'         => $this->detailRows($registration),
        ], 'layouts.admin-layout');
    }

    /* ------------------------------------------------------------------ */
    /* Döntések                                                           */
    /* ------------------------------------------------------------------ */

    public function approve(string $id): Response
    {
        $registration = $this->findOrFail($id);
        $changed = $this->registrations->approve($registration, $this->adminId(), $this->input('reason'));

        $this->toast(
            $changed ? 'success' : 'info',
            $changed
                ? "{$registration->name} regisztrációja elfogadva."
                : 'A regisztráció már ebben az állapotban volt.'
        );

        return $this->back($registration);
    }

    public function reject(string $id): Response
    {
        $registration = $this->findOrFail($id);
        $changed = $this->registrations->reject($registration, $this->adminId(), $this->input('reason'));

        $this->toast(
            $changed ? 'success' : 'info',
            $changed
                ? "{$registration->name} regisztrációja elutasítva."
                : 'A regisztráció már ebben az állapotban volt.'
        );

        return $this->back($registration);
    }

    public function revert(string $id): Response
    {
        $registration = $this->findOrFail($id);
        $changed = $this->registrations->revertToPending($registration, $this->adminId());

        $this->toast(
            $changed ? 'success' : 'info',
            $changed
                ? 'A regisztráció visszakerült elbírálásra.'
                : 'A regisztráció már elbírálásra vár.'
        );

        return $this->back($registration);
    }

    public function note(string $id): Response
    {
        $registration = $this->findOrFail($id);
        $note = (string) $this->input('note');

        if (trim($note) === '') {
            $this->toast('warning', 'A megjegyzés üres volt, nem mentettük.');

            return $this->back($registration);
        }

        $this->registrations->addNote($registration, $this->adminId(), $note);
        $this->toast('success', 'Megjegyzés mentve.');

        return $this->back($registration);
    }

    public function destroy(string $id): Response
    {
        $registration = $this->findOrFail($id);
        $name = (string) $registration->name;

        $registration->delete();

        $this->toast('success', "{$name} regisztrációja törölve.");

        return $this->redirect('/admin/registrations');
    }

    /* ------------------------------------------------------------------ */
    /* Export                                                             */
    /* ------------------------------------------------------------------ */

    /** A szűrt lista letöltése CSV-ben (Excel-kompatibilis, UTF-8 BOM-mal). */
    public function export(): Response
    {
        $filters = $this->filters();

        $rows = Registration::query()
            ->status($filters['status'])
            ->type($filters['type'])
            ->mode($filters['mode'])
            ->search($filters['q'])
            ->orderBy('id')
            ->get();

        $handle = fopen('php://temp', 'r+');
        fwrite($handle, "\xEF\xBB\xBF");

        fputcsv($handle, [
            'Azonosító', 'Státusz', 'Típus', 'Név', 'E-mail', 'Cég / Egyetem',
            'Telefon', 'Részvétel', 'Nyelv', 'Beküldve', 'Elbírálva', 'Indoklás',
        ], ';');

        foreach ($rows as $row) {
            fputcsv($handle, [
                $row->reference,
                $row->statusLabel(),
                $row->typeLabel(),
                $row->name,
                $row->email,
                $row->company,
                $row->phone,
                $row->modeLabel(),
                $row->language,
                (string) $row->created_at,
                (string) $row->reviewed_at,
                (string) $row->decision_reason,
            ], ';');
        }

        rewind($handle);
        $csv = (string) stream_get_contents($handle);
        fclose($handle);

        return $this->response($csv, 200, [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="zeroday-regisztraciok-' . date('Y-m-d') . '.csv"',
        ]);
    }

    /* ------------------------------------------------------------------ */
    /* Belső                                                              */
    /* ------------------------------------------------------------------ */

    /**
     * A lista fölötti számkártyák, egyben gyorsszűrők.
     *
     * @param array<string,int> $stats
     * @param array<string,?string> $filters
     * @return list<array{label:string,value:int,tone:string,url:string,active:bool}>
     */
    private function statCards(array $stats, array $filters): array
    {
        $cards = [
            ['label' => 'Összes',          'value' => $stats['total'],    'tone' => '',              'status' => null],
            ['label' => 'Elbírálásra vár', 'value' => $stats['pending'],  'tone' => 'is-pending',    'status' => Registration::STATUS_PENDING],
            ['label' => 'Elfogadva',       'value' => $stats['approved'], 'tone' => 'is-approved',   'status' => Registration::STATUS_APPROVED],
            ['label' => 'Elutasítva',      'value' => $stats['rejected'], 'tone' => 'is-rejected',   'status' => Registration::STATUS_REJECTED],
        ];

        return array_map(static function (array $card) use ($filters): array {
            $query = array_filter([
                'status' => $card['status'],
                'type'   => $filters['type'],
                'mode'   => $filters['mode'],
                'q'      => $filters['q'],
            ], static fn ($value): bool => $value !== null && $value !== '');

            return [
                'label'  => $card['label'],
                'value'  => (int) $card['value'],
                'tone'   => $card['tone'],
                'url'    => '/admin/registrations' . ($query === [] ? '' : '?' . http_build_query($query)),
                'active' => $filters['status'] === $card['status'],
            ];
        }, $cards);
    }

    /**
     * A részletek oldal adatpárjai.
     *
     * @return list<array{label:string,value:string}>
     */
    private function detailRows(Registration $registration): array
    {
        return [
            ['label' => 'Azonosító',      'value' => (string) $registration->reference],
            ['label' => 'Típus',          'value' => $registration->typeLabel()],
            ['label' => 'Név',            'value' => (string) $registration->name],
            ['label' => 'E-mail',         'value' => (string) $registration->email],
            ['label' => 'Cég / Egyetem',  'value' => (string) $registration->company],
            ['label' => 'Telefonszám',    'value' => (string) $registration->phone],
            ['label' => 'Részvétel',      'value' => $registration->modeLabel()],
            ['label' => 'Kitöltés nyelve', 'value' => strtoupper((string) $registration->language)],
            ['label' => 'Beküldve',       'value' => (string) ($registration->created_at?->format('Y.m.d. H:i') ?? '')],
            ['label' => 'IP',             'value' => (string) $registration->ip_address],
        ];
    }

    /** @param array<string,?string> $filters */
    private function filterQuery(array $filters): string
    {
        $query = array_filter($filters, static fn ($value): bool => $value !== null && $value !== '');

        return $query === [] ? '' : '?' . http_build_query($query);
    }

    /** @return array{status:?string,type:?string,mode:?string,q:?string} */
    private function filters(): array
    {
        return [
            'status' => $this->queryValue('status', Registration::STATUSES),
            'type'   => $this->queryValue('type', Registration::TYPES),
            'mode'   => $this->queryValue('mode', Registration::MODES),
            'q'      => trim((string) ($_GET['q'] ?? '')) ?: null,
        ];
    }

    /** @param array<int,string> $allowed */
    private function queryValue(string $key, array $allowed): ?string
    {
        $value = (string) ($_GET[$key] ?? '');

        return in_array($value, $allowed, true) ? $value : null;
    }

    private function input(string $key): ?string
    {
        $value = $_POST[$key] ?? null;

        return is_string($value) ? $value : null;
    }

    private function findOrFail(string $id): Registration
    {
        $registration = Registration::find($id);

        if ($registration === null) {
            abort(404);
        }

        return $registration;
    }

    private function adminId(): ?int
    {
        $adminId = $_SESSION['admin_id'] ?? null;

        return $adminId === null ? null : (int) $adminId;
    }

    /**
     * A művelet után vagy a részletek oldalra, vagy a listára megyünk vissza –
     * attól függően, honnan érkezett a kérés.
     */
    private function back(Registration $registration): Response
    {
        $from = (string) ($_POST['from'] ?? '');

        return $this->redirect($from === 'index'
            ? '/admin/registrations' . $this->queryString()
            : '/admin/registrations/' . $registration->id);
    }

    private function queryString(): string
    {
        $query = array_filter([
            'status' => $_POST['f_status'] ?? null,
            'type'   => $_POST['f_type'] ?? null,
            'mode'   => $_POST['f_mode'] ?? null,
            'q'      => $_POST['f_q'] ?? null,
            'page'   => $_POST['f_page'] ?? null,
        ], static fn ($value): bool => is_string($value) && $value !== '');

        return $query === [] ? '' : '?' . http_build_query($query);
    }
}
