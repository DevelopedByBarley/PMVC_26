<?php

return [
    'required' => 'The :attribute field is required.',
    'email' => 'The :attribute field must be a valid email address.',
    'min' => [
        'string' => 'The :attribute field must be at least :min characters.',
    ],
    'max' => [
        'string' => 'The :attribute field may not be greater than :max characters.',
    ],
    'attributes' => [
        'name' => 'name',
        'email' => 'email address',
    ],
    'unique' => 'The :attribute has already been taken.',
];
