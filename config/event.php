<?php

declare(strict_types=1);

/**
 * A konferencia adatai egy helyen. A nyelvfüggő szövegek a
 * resources/lang/{hu,en}/home.php fájlokban vannak.
 */
return [
    'name' => 'ZeroDay 2026',

    // A szervező egyetemek (a fejléc lockup sorában, pont-szeparátorral).
    'universities' => ['ELTE', 'GDE', 'PTE'],
    'url' => env('APP_URL', 'https://zeroday.gde.hu'),

    // A visszaszámláló céldátuma (ISO 8601).
    'iso' => '2026-10-07T09:00:00+02:00',

    'program' => '09:00 – 14:00',
    'venue' => 'Larus Rendezvényközpont',
    'address' => '1124 Budapest, Csörsz utca 18/b – Gesztenyéskert',
    'maps' => 'https://maps.google.com/?q=Larus+Rendezv%C3%A9nyk%C3%B6zpont+Budapest+Cs%C3%B6rsz+utca+18%2Fb',

    'contact_email' => env('EVENT_CONTACT_EMAIL', 'info@zeroday.gde.hu'),
];
