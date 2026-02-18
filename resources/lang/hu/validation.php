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
    'attributes' => [
        'name' => 'név',
        'email' => 'email cím',
    ],
    'unique' => 'A(z) :attribute már foglalt.',
];
