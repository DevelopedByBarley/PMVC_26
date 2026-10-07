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
    'attributes' => [
        'name' => 'név',
        'email' => 'email cím',
    ],
    'unique' => 'A(z) :attribute már foglalt.',
];
