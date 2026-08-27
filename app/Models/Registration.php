<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Registration extends Model
{
    protected $table = 'registrations';

    /* ------------------------------------------------------------------ */
    /* Állapotok és felsorolások                                          */
    /* ------------------------------------------------------------------ */

    public const STATUS_PENDING  = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';

    public const TYPE_ATTENDEE = 'attendee';
    public const TYPE_SPEAKER  = 'speaker';

    public const MODE_ONLINE    = 'online';
    public const MODE_IN_PERSON = 'in_person';

    public const STATUSES = [self::STATUS_PENDING, self::STATUS_APPROVED, self::STATUS_REJECTED];
    public const TYPES    = [self::TYPE_ATTENDEE, self::TYPE_SPEAKER];
    public const MODES    = [self::MODE_ONLINE, self::MODE_IN_PERSON];

    protected $casts = [
        'gdpr_accepted_at' => 'datetime',
        'reviewed_at'      => 'datetime',
    ];

    /* ------------------------------------------------------------------ */
    /* Kapcsolatok                                                        */
    /* ------------------------------------------------------------------ */

    public function events(): HasMany
    {
        return $this->hasMany(RegistrationEvent::class)->orderByDesc('id');
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'reviewed_by');
    }

    /* ------------------------------------------------------------------ */
    /* Scope-ok                                                          */
    /* ------------------------------------------------------------------ */

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_APPROVED);
    }

    public function scopeRejected(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_REJECTED);
    }

    public function scopeStatus(Builder $query, ?string $status): Builder
    {
        return in_array($status, self::STATUSES, true)
            ? $query->where('status', $status)
            : $query;
    }

    public function scopeType(Builder $query, ?string $type): Builder
    {
        return in_array($type, self::TYPES, true)
            ? $query->where('type', $type)
            : $query;
    }

    public function scopeMode(Builder $query, ?string $mode): Builder
    {
        return in_array($mode, self::MODES, true)
            ? $query->where('mode', $mode)
            : $query;
    }

    /** Kereső: név, e-mail, cég vagy azonosító. */
    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        $term = trim((string) $term);

        if ($term === '') {
            return $query;
        }

        $like = '%' . $term . '%';

        return $query->where(function (Builder $q) use ($like): void {
            $q->where('name', 'like', $like)
                ->orWhere('email', 'like', $like)
                ->orWhere('company', 'like', $like)
                ->orWhere('reference', 'like', $like);
        });
    }

    /* ------------------------------------------------------------------ */
    /* Segédek                                                            */
    /* ------------------------------------------------------------------ */

    public function isPending(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isApproved(): bool
    {
        return $this->status === self::STATUS_APPROVED;
    }

    public function isRejected(): bool
    {
        return $this->status === self::STATUS_REJECTED;
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            self::STATUS_APPROVED => 'Elfogadva',
            self::STATUS_REJECTED => 'Elutasítva',
            default               => 'Elbírálásra vár',
        };
    }

    /** Bootstrap badge osztály a státuszhoz. */
    public function statusBadge(): string
    {
        return match ($this->status) {
            self::STATUS_APPROVED => 'text-bg-success',
            self::STATUS_REJECTED => 'text-bg-danger',
            default               => 'text-bg-warning',
        };
    }

    public function typeLabel(string $language = 'hu'): string
    {
        return match ([$this->type, $language]) {
            [self::TYPE_SPEAKER, 'en']  => 'Speaker registration',
            [self::TYPE_ATTENDEE, 'en'] => 'Attendee registration',
            [self::TYPE_SPEAKER, 'hu']  => 'Előadói regisztráció',
            default                     => 'Résztvevői regisztráció',
        };
    }

    public function modeLabel(string $language = 'hu'): string
    {
        return match ([$this->mode, $language]) {
            [self::MODE_ONLINE, 'en']    => 'Online',
            [self::MODE_IN_PERSON, 'en'] => 'In person',
            [self::MODE_ONLINE, 'hu']    => 'Online',
            default                      => 'Személyesen',
        };
    }

    /** Egyedi, emberi azonosító (pl. ZD26-7F3A91). */
    public static function generateReference(): string
    {
        do {
            $reference = 'ZD26-' . strtoupper(bin2hex(random_bytes(3)));
        } while (static::where('reference', $reference)->exists());

        return $reference;
    }

    public static function generateToken(): string
    {
        do {
            $token = bin2hex(random_bytes(24));
        } while (static::where('token', $token)->exists());

        return $token;
    }
}
