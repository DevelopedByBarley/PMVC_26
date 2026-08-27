<?php

declare(strict_types=1);

/**
 * ZeroDay 2026 – regisztráció visszaigazoló oldal (magyar).
 * Betöltés: Core\Language::load('registration')
 */

return [
    'meta' => [
        'title' => 'Regisztráció beérkezett – ZeroDay 2026',
    ],

    'success' => [
        'eyebrow' => 'Regisztráció',
        'title' => 'Köszönjük a regisztrációt!',
        'lead' => 'Jelentkezését rögzítettük. A szervezők ellenőrzik az adatokat, '
            . 'és a végleges visszaigazolást ezután kapja meg.',
        'reference' => 'Regisztrációs azonosító',
        'refhint' => 'Kérjük, kérdés esetén erre az azonosítóra hivatkozzon.',
        'datatitle' => 'A beküldött adatok',
        'labels' => [
            'type' => 'Regisztráció típusa',
            'name' => 'Név',
            'email' => 'E-mail cím',
            'company' => 'Cég / Egyetem',
            'phone' => 'Telefonszám',
            'mode' => 'Részvétel módja',
            'status' => 'Állapot',
            'submitted' => 'Beküldve',
        ],
        'statuses' => [
            'pending' => 'Elbírálásra vár',
            'approved' => 'Visszaigazolva',
            'rejected' => 'Elutasítva',
        ],
        'eventtitle' => 'Az esemény',
        'eventdate' => '2026. október 7., szerda, 09:00 – 14:00',
        'contact' => 'Ha valamelyik adat hibás, írjon nekünk:',
        'back' => 'Vissza a főoldalra',
    ],
];
