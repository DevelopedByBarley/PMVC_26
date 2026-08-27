<?php

declare(strict_types=1);

/**
 * ZeroDay 2026 – publikus landing szövegei (english).
 * Betöltés: Core\Language::load('home')
 */

return [
    'meta' => [
        'title' => 'ZeroDay 2026 – Cybersecurity Conference · ELTE · GDE · PTE',
    ],

    'hero' => [
        'eyebrow'  => '7 October 2026 · Budapest · Hybrid',
        'kicker'   => 'ELTE · GDE · PTE Cyber Conference 2026',
        'tagline'  => 'Time is running out.',
        'lead'     => 'A national professional conference on identifying and preventing cyber threats, on effective knowledge sharing, and on the evolution of the Hungarian regulatory environment.',
        'cta1'     => 'Register now',
        'cta2'     => 'View the programme',
        'chips'    => [
            ['label' => 'Date',   'value' => 'Wednesday, 7 October 2026'],
            ['label' => 'Agenda', 'value' => '09:00 – 14:00'],
            ['label' => 'Format', 'value' => 'Hybrid – on site and online'],
        ],
    ],
    'countdown' => [
        'title'  => 'Countdown',
        'target' => '7 October 2026, 09:00 (CEST)',
        'units'  => ['days', 'hours', 'minutes', 'seconds'],
        'live'   => 'Live countdown',
        'started' => 'The conference has started.',
    ],
    'pillars' => [
        ['title' => 'Shared knowledge', 'text' => 'The expertise of three universities on one stage.'],
        ['title' => 'Collaboration',    'text' => 'Academia, government and industry around one table.'],
        ['title' => 'Security',         'text' => 'Current knowledge, advanced technology, real practice.'],
        ['title' => 'Future',           'text' => 'A modern regulatory environment and prepared professionals.'],
    ],
    'about' => [
        'eyebrow' => 'Why this conference',
        'title'   => 'Cybersecurity is no longer<br><span>a technology question.</span>',
        'body'    => [
            'Cybersecurity today is no longer merely a technological question: it is one of the most important – though often invisible – pillars of modern civilisation.',
            'Eötvös Loránd University (ELTE), Gábor Dénes University (GDE) and the University of Pécs (PTE) share the conviction that its solid foundation is built on the unity of up-to-date knowledge, advanced technological solutions and a modern regulatory environment.',
            'To pursue these goals, our institutions have launched this national professional conference, which helps identify and prevent cyber threats, encourages effective knowledge sharing, and supports the development of the Hungarian regulatory environment.',
        ],
        'facts' => [
            ['num' => '3',   'label' => 'host universities'],
            ['num' => '6+',  'label' => 'expert talks'],
            ['num' => '5',   'label' => 'hours of programme'],
            ['num' => '2',   'label' => 'ways to attend'],
        ],
    ],
    'audience' => [
        'eyebrow' => 'Who we expect',
        'title'   => 'This is for you if…',
        'items'   => [
            [
                'tag'  => 'Expert',
                'text' => 'you know what a Zero Day is.',
            ],
            [
                'tag'  => 'Cyber defence',
                'text' => 'you work in cyber defence and have to handle threats, prepare for audits and support management decisions all at once.',
            ],
            [
                'tag'  => 'Executive',
                'text' => 'you are a company leader who does not just want to tick off the mandatory eight-hour cyber training, but has realised that cybersecurity is about operations, accountability and your own decisions.',
            ],
            [
                'tag'  => 'Audit & compliance',
                'text' => 'you are an audit, incident response, risk management or compliance professional who wants to see the actual operation behind the documents.',
            ],
        ],
    ],
    'program' => [
        'eyebrow' => 'Preliminary programme',
        'title'   => 'Wednesday, 7 October 2026',
        'note'    => 'The programme is preliminary and subject to change.',
        'rows'    => [
            ['time' => '8:30 – 9:00',   'type' => 'break', 'title' => 'Registration, arrival and joining online'],
            ['time' => '9:00 – 9:30',   'type' => 'main',  'title' => 'University opening remarks'],
            ['time' => '9:30 – 9:50',   'type' => 'talk',  'title' => 'Andrea Polereczki', 'desc' => 'The Hungarian cybersecurity landscape, state expectations and the tasks ahead for information security officers.'],
            ['time' => '9:50 – 10:10',  'type' => 'talk',  'title' => 'Ferenc Frész',      'desc' => 'Cybercrime, geopolitics, critical infrastructure and the acceleration of attacker capabilities.'],
            ['time' => '10:10 – 10:30', 'type' => 'talk',  'title' => 'Dr. Csaba Krasznay'],
            ['time' => '10:30 – 10:50', 'type' => 'talk',  'title' => 'Péter Rónaszéki'],
            ['time' => '10:50 – 11:15', 'type' => 'break', 'title' => 'Coffee break'],
            ['time' => '11:15 – 11:35', 'type' => 'talk',  'title' => 'Péter Zsóros',      'desc' => 'Practical expert support for CISOs: connecting compliance with actual capability.'],
            ['time' => '11:35 – 11:55', 'type' => 'talk',  'title' => 'Péter Suti',        'desc' => 'Through a concrete corporate process: documents, evidence, self-assessment, gaps and measures.'],
            ['time' => '11:55 – 12:10', 'type' => 'main',  'title' => 'ELTE presentation'],
            ['time' => '12:10 – 12:25', 'type' => 'main',  'title' => 'PTE presentation'],
            ['time' => '12:25 – 12:40', 'type' => 'main',  'title' => 'GDE presentation'],
            ['time' => '12:40 – 14:00', 'type' => 'break', 'title' => 'Lunch – informal professional networking'],
        ],
    ],
    'venue' => [
        'eyebrow'  => 'Venue',
        'title'    => 'Larus Event Center',
        'text'     => 'A hybrid conference: join us in person in Budapest, or attend online. You can choose your mode of participation during registration.',
        'maplink'  => 'Open in maps',
        'rows'     => [
            ['label' => 'Address', 'value' => 'Csörsz utca 18/b – Gesztenyéskert, 1124 Budapest, Hungary'],
            ['label' => 'Date',    'value' => 'Wednesday, 7 October 2026, 09:00 – 14:00'],
            ['label' => 'Arrival', 'value' => 'Registration and online join-in from 8:30'],
            ['label' => 'Language','value' => 'Hungarian (no interpretation online)'],
        ],
    ],
    'form' => [
        'eyebrow'   => 'Registration',
        'title'     => 'Registration',
        'lead'      => 'Select how you would like to participate in the conference:',
        'typelabel' => 'Registration type',
        'attendee'  => 'Attendee registration',
        'speaker'   => 'Speaker registration',
        'closed'    => 'closed',
        'name'      => 'Name',
        'email'     => 'Email address',
        'company'   => 'Company / University',
        'phone'     => 'Phone number',
        'modelabel' => 'How would you like to participate?',
        'online'    => 'Online',
        'inperson'  => 'In Person',
        'gdpr'      => 'I accept the privacy notice.',
        'submit'    => 'Send registration',
        'after'     => 'We will send the confirmation by email.',
    ],
    'archive' => [
        'eyebrow' => 'Past conferences',
        'title'   => 'Where we come from',
        'text'    => 'Materials and recordings from our earlier conferences on these topics.',
        'items'   => [
            ['year' => '2025', 'title' => 'Cybersecurity conference',      'meta' => 'ELTE · GDE · PTE'],
            ['year' => '2024', 'title' => 'IT security professional day',  'meta' => 'GDE'],
            ['year' => '2023', 'title' => 'Data protection and compliance','meta' => 'ELTE'],
        ],
        'link'    => 'Open',
    ],
    'organisers' => [
        'eyebrow' => 'Academic partners',
        'title'   => 'Brought to life together by',
        'items'   => [
            ['short' => 'ELTE', 'name' => 'Eötvös Loránd University'],
            ['short' => 'GDE',  'name' => 'Gábor Dénes University'],
            ['short' => 'PTE',  'name' => 'University of Pécs'],
        ],
    ],
];
