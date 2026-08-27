<?php

return [
    'required' => 'A(z) :attribute mező kitöltése kötelező.',
    'email' => 'A(z) :attribute mezőnek érvényes email címnek kell lennie.',
    'min' => [
        'string' => 'A(z) :attribute mező legalább :min karakter legyen.',
    ],
    'max' => [
        'string' => 'A(z) :attribute mező legfeljebb :max karakter lehet.',
    ],
    'in' => 'A kiválasztott :attribute érvénytelen.',
    'accepted' => 'A(z) :attribute elfogadása kötelező.',
    'boolean' => 'A(z) :attribute mező csak igaz vagy hamis lehet.',
    'unique' => 'A(z) :attribute már foglalt.',
    // A választós mezőknél a sablonos "kitöltése kötelező" félrevezető.
    'custom' => [
        'type' => [
            'required' => 'Kérjük, válassza ki a regisztráció típusát.',
        ],
        'mode' => [
            'required' => 'Kérjük, válassza ki a részvétel módját.',
        ],
    ],
    'attributes' => [
        'name' => 'név',
        'email' => 'email cím',
        'type' => 'regisztráció típusa',
        'company' => 'cég / egyetem',
        'phone' => 'telefonszám',
        'mode' => 'részvétel módja',
        'gdpr' => 'adatkezelési tájékoztató',
        'reason' => 'indoklás',
        'note' => 'megjegyzés',
    ],
];
