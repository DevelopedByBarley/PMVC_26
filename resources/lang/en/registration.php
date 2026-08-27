<?php

declare(strict_types=1);

/**
 * ZeroDay 2026 – registration confirmation page (english).
 * Loaded by: Core\Language::load('registration')
 */

return [
    'meta' => [
        'title' => 'Registration received – ZeroDay 2026',
    ],

    'success' => [
        'eyebrow' => 'Registration',
        'title' => 'Thank you for registering!',
        'lead' => 'We have recorded your registration. The organisers will review the '
            . 'details and you will receive the final confirmation afterwards.',
        'reference' => 'Registration reference',
        'refhint' => 'Please quote this reference in any correspondence.',
        'datatitle' => 'Submitted details',
        'labels' => [
            'type' => 'Registration type',
            'name' => 'Name',
            'email' => 'Email address',
            'company' => 'Company / University',
            'phone' => 'Phone number',
            'mode' => 'Participation',
            'status' => 'Status',
            'submitted' => 'Submitted',
        ],
        'statuses' => [
            'pending' => 'Awaiting review',
            'approved' => 'Confirmed',
            'rejected' => 'Rejected',
        ],
        'eventtitle' => 'The event',
        'eventdate' => 'Wednesday, 7 October 2026, 09:00 – 14:00',
        'contact' => 'If any detail is incorrect, write to us:',
        'back' => 'Back to the home page',
    ],
];
