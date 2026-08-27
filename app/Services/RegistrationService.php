<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Registration;
use App\Models\RegistrationEvent;

/**
 * A regisztrációk üzleti logikája egy helyen: beküldés, elfogadás, elutasítás,
 * visszaállítás, megjegyzés – mindegyik naplózva a registration_events táblába.
 *
 * A controllerek csak validálnak és ezt hívják.
 *
 * TODO (e-mail): a beküldés / elfogadás / elutasítás pontokon később innen
 * indul majd a levélküldés is (view alapú sablonokkal).
 */
class RegistrationService
{
    /**
     * Új regisztráció a publikus formról.
     *
     * @param array{type:string,name:string,email:string,company:string,phone:string,mode:string,language:string} $data
     */
    public function submit(array $data): Registration
    {
        $registration = Registration::create([
            'reference'        => Registration::generateReference(),
            'token'            => Registration::generateToken(),
            'type'             => $data['type'],
            'name'             => $data['name'],
            'email'            => $data['email'],
            'company'          => $data['company'],
            'phone'            => $data['phone'],
            'mode'             => $data['mode'],
            'language'         => $data['language'],
            'status'           => Registration::STATUS_PENDING,
            'gdpr_accepted_at' => date('Y-m-d H:i:s'),
            'ip_address'       => $this->clientIp(),
            'user_agent'       => mb_substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 255),
        ]);

        $this->logEvent($registration, RegistrationEvent::ACTION_SUBMITTED, null, [
            'to_status' => Registration::STATUS_PENDING,
            'note'      => 'Beküldve a publikus regisztrációs formról.',
        ]);

        return $registration;
    }

    /** Elfogadás. A $reason bekerül a naplóba (és később a levélbe). */
    public function approve(Registration $registration, ?int $adminId, ?string $reason = null): bool
    {
        return $this->decide($registration, Registration::STATUS_APPROVED, $adminId, $reason);
    }

    /** Elutasítás. */
    public function reject(Registration $registration, ?int $adminId, ?string $reason = null): bool
    {
        return $this->decide($registration, Registration::STATUS_REJECTED, $adminId, $reason);
    }

    /** Téves döntés visszavonása: vissza "elbírálásra vár" állapotba. */
    public function revertToPending(Registration $registration, ?int $adminId): bool
    {
        if ($registration->isPending()) {
            return false;
        }

        $from = (string) $registration->status;

        $registration->status          = Registration::STATUS_PENDING;
        $registration->decision_reason = null;
        $registration->reviewed_by     = null;
        $registration->reviewed_at     = null;
        $registration->save();

        $this->logEvent($registration, RegistrationEvent::ACTION_REVERTED, $adminId, [
            'from_status' => $from,
            'to_status'   => Registration::STATUS_PENDING,
        ]);

        return true;
    }

    /** Belső, csak adminok által látott megjegyzés. */
    public function addNote(Registration $registration, ?int $adminId, string $note): void
    {
        $registration->admin_note = $note;
        $registration->save();

        $this->logEvent($registration, RegistrationEvent::ACTION_NOTE, $adminId, ['note' => $note]);
    }

    /**
     * Van már folyamatban lévő vagy elfogadott regisztráció ezzel az e-maillel?
     */
    public function hasActiveRegistration(string $email): bool
    {
        if (config('registration.block_duplicate_email', true) !== true) {
            return false;
        }

        return Registration::where('email', $email)
            ->whereIn('status', [Registration::STATUS_PENDING, Registration::STATUS_APPROVED])
            ->exists();
    }

    public function isOpen(string $type): bool
    {
        return (bool) config('registration.open.' . $type, false);
    }

    /** Számok az admin listához és a dashboardhoz. */
    public function stats(): array
    {
        $byStatus = Registration::query()
            ->selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status')
            ->all();

        return [
            'total'     => array_sum($byStatus),
            'pending'   => (int) ($byStatus[Registration::STATUS_PENDING] ?? 0),
            'approved'  => (int) ($byStatus[Registration::STATUS_APPROVED] ?? 0),
            'rejected'  => (int) ($byStatus[Registration::STATUS_REJECTED] ?? 0),
            'online'    => Registration::approved()->where('mode', Registration::MODE_ONLINE)->count(),
            'in_person' => Registration::approved()->where('mode', Registration::MODE_IN_PERSON)->count(),
            'speakers'  => Registration::where('type', Registration::TYPE_SPEAKER)->count(),
        ];
    }

    /* ------------------------------------------------------------------ */
    /* Belső                                                              */
    /* ------------------------------------------------------------------ */

    private function decide(Registration $registration, string $status, ?int $adminId, ?string $reason): bool
    {
        if ($registration->status === $status) {
            return false;
        }

        $from   = (string) $registration->status;
        $reason = $this->trimOrNull($reason);

        $registration->status          = $status;
        $registration->decision_reason = $reason;
        $registration->reviewed_by     = $adminId;
        $registration->reviewed_at     = date('Y-m-d H:i:s');
        $registration->save();

        $this->logEvent(
            $registration,
            $status === Registration::STATUS_APPROVED
                ? RegistrationEvent::ACTION_APPROVED
                : RegistrationEvent::ACTION_REJECTED,
            $adminId,
            ['from_status' => $from, 'to_status' => $status, 'note' => $reason]
        );

        return true;
    }

    /** @param array{from_status?:?string,to_status?:?string,note?:?string} $extra */
    private function logEvent(Registration $registration, string $action, ?int $adminId, array $extra = []): RegistrationEvent
    {
        return RegistrationEvent::create([
            'registration_id' => $registration->id,
            'admin_id'        => $adminId,
            'action'          => $action,
            'from_status'     => $extra['from_status'] ?? null,
            'to_status'       => $extra['to_status'] ?? null,
            'note'            => $extra['note'] ?? null,
        ]);
    }

    private function trimOrNull(?string $value): ?string
    {
        $value = trim((string) $value);

        return $value === '' ? null : $value;
    }

    private function clientIp(): ?string
    {
        $ip = $_SERVER['REMOTE_ADDR'] ?? null;

        return is_string($ip) ? mb_substr($ip, 0, 45) : null;
    }
}
