<?php

return [
    'property_type' => [
        'building apartment' => 'stan u zgradi',
        'house apartment' => 'stan u kući',
        'apartment' => 'apartman',
        'studio' => 'salonac',
        'penthouse' => 'penthaus',
        'courtyard apartment' => 'dvorišni stan',
        'duplex' => 'dupleks',
    ],
    'registered' => [
        'yes' => ['da', 'uknjiženo'],
        'no' => ['ne', 'nije uknjiženo'],
        'in process' => ['u procesu', 'u procesu uknjižavanja'],
        'partially' => ['delimično', 'delimično uknjižen'],
    ],
    'condition' => [
        'usual' => 'uobičajeno',
        'new' => 'novo',
        'under construction' => 'u izgradnji',
        'renovated' => 'renovirano',
        'needs renovation' => 'potrebno renoviranje',
        'good condition' => 'dobro stanje',
        'old' => 'staro',
        'well maintained' => 'održavano',
        'luxurious' => 'luksuzno',
    ],
    'heating' => [
        'none' => ['nema', 'nema grejanje'],
        'central' => 'centralno',
        'individual' => 'etažno',
        'electricity' => 'na struju',
        'gas' => 'gas',
        'tiled stove' => 'kaljeva peć',
        'electric storage heater' => 'TA peć',
        'norwegian radiators' => 'norveški radijatori',
        'underfloor' => 'podno',
        'solid fuel' => 'čvrsto gorivo',
        'allocators' => 'alokatori',
        'heat pump' => 'toplotna pumpa',
        'air conditioning' => 'klima',
        'marble radiator' => 'mermerni radijator',
    ],
    'furnishings' => [
        'empty' => 'prazno',
        'semi furnished' => 'polunamešteno',
        'furnished' => 'namešteno',
    ],
    'floor' => [
        'basement' => 'podrum',
        'cellar' => 'suteren',
        'low ground floor' => 'nisko prizemlje',
        'ground floor' => 'prizemlje',
        'high ground floor' => 'visoko prizemlje',
        'attic' => 'potkrovlje',
    ],
    'elevator' => [
        'nema lift',
        'ima lift',
        'ima lift (2)',
        'ima lift (3+)',
    ],
    'internet_type' => [
        'none' => ['nema', 'nema internet'],
        'ADSL' => 'ADSL',
        'optical' => 'optički',
        'cable' => 'kablovska',
        'satellite' => 'satelitski',
        'wireless' => 'bežični',
    ],
    'smoking_allowed' => [
        'ne',
        'da',
    ],
    'pets_allowed' => [
        'ne',
        'da',
    ],
    'payment_schedule' => [
        1 => 'dan',
        30 => 'mesec dana',
        90 => '3 meseca',
        180 => '6 meseci',
        365 => 'godinu dana',
    ],

    'available_now' => 'odmah useljivo',

    'year_built' => 'ne znam',

    'equipment_name' => [
        'air conditioning' => 'klima',
        'business furniture' => 'poslovni nameštaj',
        'wardrobe' => 'plakar',
        'built-in wardrobe' => 'ugradni plakar',
        'american wardrobe' => 'američki plakar',
        'tv' => 'TV',
        'bed' => 'ležaj',
        'washing machine' => 'veš mašina',
        'kitchen units' => 'kuhinjski elementi',
        'dishwasher' => 'sudomašina',
        'refrigerator' => 'frižider',
        'freezer' => 'zamrzivač',
        'microwave oven' => 'mikrotalasna rerna',
        'oven' => 'rerna',
        'stove' => 'šporet',
        'telephone line' => 'telefonska linija',
        'cable' => 'kablovska',
    ],
    'parking' => [
        'public out of zone' => 'javni parking van zone',
        'public in the zone' => 'javni parking u zoni',
        'in the building courtyard' => 'parking u dvorištu zgrade',
    ],
    'garage' => [
        'within the facility' => 'garaža u sklopu objekta',
        'public' => 'javna garaža',
    ],

    // ADDITIONAL
    'suitable' => [
        'workers' => 'radnike',
        'family' => 'porodicu',
        'students' => 'studente',
    ],
    'view' => [
        'street' => ['ulica', 'pogled ka ulici'],
        'courtyard' => ['dvorište', 'pogled ka dvorištu'],
    ],

    // INFRASTRUCTURE
    'infrastructure_name' => [
        'loggia' => [
            'no loggia' => 'nema lođu',
            'loggia 1' => 'lođa',
            'loggia 2' => 'lođe (2)',
            'loggia 3+' => 'lođe (3+)',
        ],
        'balcony' => [
            'no balcony' => 'nema terasu',
            'balcony 1' => 'terasa',
            'balcony 2' =>'terase (2)',
            'balcony 3+' => 'terase (3+)',
        ],
        'disabled access' => 'prilaz za invalide',
        'courtyard' => 'dvorište',
        'sauna' => 'sauna',
        'fitness' => 'fitness',
        'ventilation' => 'ventilacija',
        'central air conditioning' => 'centralna klima',
        'surveillance camera' => 'video nadzor',
        'alarm' => 'alarm',
        'reception' => 'recepcija',
    ],

    // INTERIOR ROOMS
    'room_name' => [
        'bathroom' => [
            'no bathroom' => 'nema kupatilo',
            'bathroom 1' => 'kupatilo',
            'bathroom 2' => 'kupatila (2)',
            'bathroom 3+' => 'kupatila (3+)',
        ],
        'toilet' => [
            'no toilet' => 'nema toalet',
            'toilet 1' => 'toalet',
            'toilet 2' => 'toaleta (2)',
            'toilet 3+' => 'toaleta (3+)',
        ],
        'kitchen' => 'kuhinja',
        'storage' => 'ostava',
        'basement' => 'podrum',
        'loft' => 'tavan',
    ],
];
