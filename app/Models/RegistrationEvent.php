<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrationEvent extends Model
{
    protected $table = 'registration_events';

    public const ACTION_SUBMITTED    = 'submitted';
    public const ACTION_APPROVED     = 'approved';
    public const ACTION_REJECTED     = 'rejected';
    public const ACTION_REVERTED     = 'reverted';
    public const ACTION_NOTE         = 'note';
    public const ACTION_EMAIL_SENT   = 'email_sent';
    public const ACTION_EMAIL_FAILED = 'email_failed';

    public function registration(): BelongsTo
    {
        return $this->belongsTo(Registration::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function actionLabel(): string
    {
        return match ($this->action) {
            self::ACTION_SUBMITTED    => 'Regisztráció beérkezett',
            self::ACTION_APPROVED     => 'Elfogadva',
            self::ACTION_REJECTED     => 'Elutasítva',
            self::ACTION_REVERTED     => 'Visszaállítva elbírálásra',
            self::ACTION_NOTE         => 'Megjegyzés',
            self::ACTION_EMAIL_SENT   => 'E-mail kiküldve',
            self::ACTION_EMAIL_FAILED => 'E-mail küldés hibára futott',
            default                   => (string) $this->action,
        };
    }

    public function actionIconColor(): string
    {
        return match ($this->action) {
            self::ACTION_APPROVED     => '#16a34a',
            self::ACTION_REJECTED     => '#dc2626',
            self::ACTION_EMAIL_FAILED => '#dc2626',
            self::ACTION_EMAIL_SENT   => '#0ea5e9',
            self::ACTION_REVERTED     => '#f59e0b',
            default                   => '#64748b',
        };
    }
}
