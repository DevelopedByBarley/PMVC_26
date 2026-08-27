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
    'in' => 'The selected :attribute is invalid.',
    'accepted' => 'The :attribute must be accepted.',
    'boolean' => 'The :attribute field must be true or false.',
    'unique' => 'The :attribute has already been taken.',
    // For choice fields the generic "field is required" is misleading.
    'custom' => [
        'type' => [
            'required' => 'Please select a registration type.',
        ],
        'mode' => [
            'required' => 'Please select a participation mode.',
        ],
    ],
    'attributes' => [
        'name' => 'name',
        'email' => 'email address',
        'type' => 'registration type',
        'company' => 'company / university',
        'phone' => 'phone number',
        'mode' => 'participation mode',
        'gdpr' => 'privacy notice',
        'reason' => 'reason',
        'note' => 'note',
    ],
];
