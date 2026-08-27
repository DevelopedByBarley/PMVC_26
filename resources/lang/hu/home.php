<?php

declare(strict_types=1);

/**
 * ZeroDay 2026 – publikus landing szövegei (magyar).
 * Betöltés: Core\Language::load('home')
 */

return [
    'meta' => [
        'title' => 'ZeroDay 2026 – Kiberbiztonsági Konferencia · ELTE · GDE · PTE',
    ],

    'hero' => [
        'eyebrow'  => '2026. október 7. · Budapest · Hibrid',
        'kicker'   => 'ELTE · GDE · PTE Kiberbiztonsági Konferencia 2026',
        'tagline'  => 'Fogy az idő.',
        'lead'     => 'Országos szakmai konferencia a kiberfenyegetettség beazonosításáról és megelőzéséről, a hatékony tudásmegosztásról és a hazai szabályozási környezet fejlődéséről.',
        'cta1'     => 'Regisztrálok',
        'cta2'     => 'Program megtekintése',
        'chips'    => [
            ['label' => 'Időpont',  'value' => '2026. október 7., szerda'],
            ['label' => 'Program',  'value' => '09:00 – 14:00'],
            ['label' => 'Formátum', 'value' => 'Hibrid – helyszíni és online'],
        ],
    ],
    'countdown' => [
        'title'  => 'Visszaszámlálás',
        'target' => '2026. október 7. 09:00 (CEST)',
        'units'  => ['nap', 'óra', 'perc', 'másodperc'],
        'live'   => 'Élő visszaszámláló',
        'started' => 'A konferencia elkezdődött.',
    ],
    'pillars' => [
        ['title' => 'Közös tudás',    'text' => 'Három egyetem szakmai tapasztalata egy színpadon.'],
        ['title' => 'Együttműködés',  'text' => 'Egyetemi, állami és vállalati szereplők egy asztalnál.'],
        ['title' => 'Biztonság',      'text' => 'Naprakész tudás, fejlett technológia, valós gyakorlat.'],
        ['title' => 'Jövő',           'text' => 'Korszerű szabályozási környezet és felkészült szakemberek.'],
    ],
    'about' => [
        'eyebrow' => 'A konferencia célja',
        'title'   => 'A kiberbiztonság ma már nem<br><span>technológiai kérdés.</span>',
        'body'    => [
            'A kiberbiztonság napjainkban már nem csupán technológiai kérdés, hanem modern civilizációnk egyik legfontosabb – bár gyakran láthatatlan – tartóoszlopa.',
            'Az Eötvös Loránd Tudományegyetem (ELTE), a Gábor Dénes Egyetem (GDE), valamint a Pécsi Tudományegyetem (PTE) közös meggyőződése, hogy ennek szilárd alapját a naprakész tudás, a fejlett technológiai megoldások és a korszerű szabályozási környezet egysége alkotja.',
            'A fenti célok megvalósítása érdekében hívják életre intézményeink ezt az országos szakmai konferenciát, amely segít beazonosítani és megelőzni a kiberfenyegetettséget, ösztönzi a hatékony tudásmegosztást és támogatja a hazai szabályozási környezet fejlődését.',
        ],
        'facts' => [
            ['num' => '3',   'label' => 'szervező egyetem'],
            ['num' => '6+',  'label' => 'szakmai előadás'],
            ['num' => '5',   'label' => 'óra program'],
            ['num' => '2',   'label' => 'részvételi mód'],
        ],
    ],
    'audience' => [
        'eyebrow' => 'Kiket várunk',
        'title'   => 'Neked szól, ha…',
        'items'   => [
            [
                'tag'  => 'Szakértő',
                'text' => 'tudod, mit jelent a Zero Day.',
            ],
            [
                'tag'  => 'Kibervédelem',
                'text' => 'kibervédelemmel foglalkozol, és egyszerre kell fenyegetéseket kezelnie, auditokra készülnie és vezetői döntéseket támogatnia.',
            ],
            [
                'tag'  => 'Cégvezető',
                'text' => 'cégvezető vagy, aki nemcsak le akarja tudni a kötelezően előírt nyolcórás kibervédelmi képzést, hanem felismerte, hogy a kiberbiztonság a működésről, a felelősségről és a saját döntéseiről is szól.',
            ],
            [
                'tag'  => 'Audit & megfelelés',
                'text' => 'audit-, incidenskezelési, kockázatkezelési vagy megfelelőségi szakember vagy, aki a dokumentumok mögött a tényleges működést is látni akarja.',
            ],
        ],
    ],
    'program' => [
        'eyebrow' => 'Előzetes program',
        'title'   => '2026. október 7., szerda',
        'note'    => 'A program előzetes, a változtatás jogát fenntartjuk.',
        'rows'    => [
            ['time' => '8:30 – 9:00',   'type' => 'break', 'title' => 'Regisztráció, érkezés és online csatlakozás'],
            ['time' => '9:00 – 9:30',   'type' => 'main',  'title' => 'Egyetemi megnyitók'],
            ['time' => '9:30 – 9:50',   'type' => 'talk',  'title' => 'Polereczki Andrea', 'desc' => 'A magyar kiberbiztonsági környezet, az állami elvárások és az IBF-k előtt álló feladatok.'],
            ['time' => '9:50 – 10:10',  'type' => 'talk',  'title' => 'Frész Ferenc',      'desc' => 'Kiberbűnözés, geopolitika, kritikus infrastruktúrák és a támadói képességek gyorsulása.'],
            ['time' => '10:10 – 10:30', 'type' => 'talk',  'title' => 'Dr. Krasznay Csaba'],
            ['time' => '10:30 – 10:50', 'type' => 'talk',  'title' => 'Rónaszéki Péter'],
            ['time' => '10:50 – 11:15', 'type' => 'break', 'title' => 'Kávészünet'],
            ['time' => '11:15 – 11:35', 'type' => 'talk',  'title' => 'Zsóros Péter',      'desc' => 'A CISO-kat támogató gyakorlati szakértői működés, a megfelelés és a tényleges képesség összekapcsolása.'],
            ['time' => '11:35 – 11:55', 'type' => 'talk',  'title' => 'Suti Péter',        'desc' => 'Konkrét vállalati folyamaton keresztül: dokumentumok, evidenciák, önértékelés, hiányok és intézkedések.'],
            ['time' => '11:55 – 12:10', 'type' => 'main',  'title' => 'ELTE bemutató'],
            ['time' => '12:10 – 12:25', 'type' => 'main',  'title' => 'PTE bemutató'],
            ['time' => '12:25 – 12:40', 'type' => 'main',  'title' => 'GDE bemutató'],
            ['time' => '12:40 – 14:00', 'type' => 'break', 'title' => 'Ebéd – Kötetlen szakmai kapcsolatépítés'],
        ],
    ],
    'venue' => [
        'eyebrow'  => 'Helyszín',
        'title'    => 'Larus Rendezvényközpont',
        'text'     => 'Hibrid konferencia: vegyen részt személyesen a budapesti helyszínen, vagy csatlakozzon online. A regisztrációban választható a részvétel módja.',
        'maplink'  => 'Megnyitás térképen',
        'rows'     => [
            ['label' => 'Cím',      'value' => '1124 Budapest, Csörsz utca 18/b – Gesztenyéskert'],
            ['label' => 'Időpont',  'value' => '2026. október 7., szerda, 09:00 – 14:00'],
            ['label' => 'Érkezés',  'value' => '8:30-tól regisztráció és online csatlakozás'],
            ['label' => 'Nyelv',    'value' => 'Magyar (online tolmácsolás nélkül)'],
        ],
    ],
    'form' => [
        'eyebrow'   => 'Regisztráció',
        'title'     => 'Regisztráció',
        'lead'      => 'Válassza ki, hogy milyen módon szeretne részt venni a konferencián:',
        'typelabel' => 'Regisztráció típusa',
        'attendee'  => 'Résztvevői regisztráció',
        'speaker'   => 'Előadói regisztráció',
        'closed'    => 'zárva',
        'name'      => 'Név',
        'email'     => 'E-mail cím',
        'company'   => 'Cég / Egyetem',
        'phone'     => 'Telefonszám',
        'modelabel' => 'Részvétel módja',
        'online'    => 'Online',
        'inperson'  => 'Személyesen',
        'gdpr'      => 'Elfogadom az adatkezelési tájékoztatót.',
        'submit'    => 'Regisztráció elküldése',
        'after'     => 'A visszaigazolást e-mailben küldjük.',
    ],
    'archive' => [
        'eyebrow' => 'Korábbi konferenciák',
        'title'   => 'Ahonnan indultunk',
        'text'    => 'A témában korábban tartott konferenciáink anyagai és felvételei.',
        'items'   => [
            ['year' => '2025', 'title' => 'Kiberbiztonsági konferencia',        'meta' => 'ELTE · GDE · PTE'],
            ['year' => '2024', 'title' => 'IT biztonsági szakmai nap',          'meta' => 'GDE'],
            ['year' => '2023', 'title' => 'Adatvédelem és megfelelés',          'meta' => 'ELTE'],
        ],
        'link'    => 'Megnyitás',
    ],
    'organisers' => [
        'eyebrow' => 'Szakmai együttműködők',
        'title'   => 'A konferenciát közösen hívta életre',
        'items'   => [
            ['short' => 'ELTE', 'name' => 'Eötvös Loránd Tudományegyetem'],
            ['short' => 'GDE',  'name' => 'Gábor Dénes Egyetem'],
            ['short' => 'PTE',  'name' => 'Pécsi Tudományegyetem'],
        ],
    ],
];
