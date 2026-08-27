<?php

declare(strict_types=1);

/**
 * A regisztrációs folyamat egy helyen konfigurálva.
 * Az e-mail sablonok placeholderei innen kapják az esemény adatait.
 */
return [
    // Regisztrációs kapuk. Zárás: false -> a form nem fogadja be az adott típust.
    'open' => [
        'attendee' => env('REG_OPEN_ATTENDEE', true),
        'speaker' => env('REG_OPEN_SPEAKER', true),
    ],

    // Ugyanazzal az e-mail címmel ne lehessen többször beküldeni,
    // amíg van folyamatban lévő vagy elfogadott regisztrációja.
    'block_duplicate_email' => true,

    // Publikus form: max ennyi beküldés IP-ről a megadott időablakban.
    'throttle' => [
        'max_attempts' => env('REG_THROTTLE_MAX', 5),
        'decay_seconds' => env('REG_THROTTLE_DECAY', 900),
    ],

];
