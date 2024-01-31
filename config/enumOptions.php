<?php

return [
    'listings' => [
        'property_type' => ['building apartment', 'house apartment', 'apartment', 'studio', 'penthouse', 'courtyard apartment', 'duplex'],
        'heating' => ['none', 'central', 'individual', 'electricity', 'gas', 'tiled stove', 'electric storage heater', 'norwegian radiators', 'underfloor', 'solid fuel', 'allocators', 'heat pump', 'air conditioning', 'marble radiator'],
    ],

    'listing_info' => [
        'registered' => ['yes', 'no', 'in process', 'partially'],
        'rooms_number' => ['0.5', '1', '1.5', '2', '2.5', '3', '3.5', '4', '4.5', '5', '5.5', '6', '6.5', '7', '7.5', '8'],
        'floor' => ['basement', 'cellar', 'low ground floor', 'ground floor', 'high ground floor', 'attic'] + range(1, 29),
    ],

    'listing_details' => [
        'year_built' => ['0'] + range(1900, date("Y"), 10),
        'condition' => ['usual', 'new', 'under construction', 'renovated', 'needs renovation', 'good condition', 'old', 'well maintained', 'luxurious'],
        'furnishings' => ['empty', 'semi furnished', 'furnished'],
    ],

    'amenities' => [
        'elevator' => ['0', '1', '2', '3'],
        'internet_type' => ['none', 'ADSL', 'optical', 'cable', 'satellite', 'wireless'],
    ],

    'interior_rooms' => [
        'room_name' => ['no bathroom', 'bathroom 1', 'bathroom 2', 'bathroom 3+', 'no toilet', 'toilet 1', 'toilet 2', 'toilet 3+', 'kitchen', 'storage', 'basement', 'loft'],
    ],

    'infrastructures' => [
        'infrastructure_name' => ['no loggia', 'loggia 1', 'loggia 2', 'loggia 3+', 'no balcony', 'balcony 1', 'balcony 2', 'balcony 3+', 'disabled access', 'courtyard', 'sauna', 'fitness', 'ventilation', 'central air conditioning', 'surveillance camera', 'alarm', 'reception'],
    ],

    'equipments' => [
        'equipment_name' => ['air conditioning', 'business furniture', 'wardrobe', 'built-in wardrobe', 'american wardrobe', 'tv', 'bed', 'washing machine', 'kitchen units', 'dishwasher', 'refrigerator', 'freezer', 'microwave oven', 'oven', 'stove', 'telephone line', 'cable'],
    ],
];

