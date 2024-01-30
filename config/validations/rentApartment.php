<?php

return [
    'property_type' => 'required|in:building apartment,house apartment,apartment,studio,penthouse,courtyard apartment,duplex',
    'location_id' => 'required|integer|min:1',
    'street' => 'required|string|min:3|max:255',
    'price' => 'required|integer|min:1',
    'property_area' => 'required|integer|min:1',
    'heating' => 'required|in:none,central,individual,electricity,gas,tiled stove,electric storage heater,norwegian radiators,underfloor,solid fuel,allocators,heat pump,air conditioning,marble radiator',

    'payment_schedule' => 'required|in:1,30,90,180,365',
    'registered' => 'nullable|in:yes,no,in process,partially',
    'deposit' => 'nullable|integer|min:1',
    'rooms_number' => 'required|in:0.5,1,1.5,2,2.5,3,3.5,4,4.5,5,5.5,6,6.5,7,7.5,8',
    'floor' => ['required', 'in:basement,cellar,low ground floor,ground floor,high ground floor,attic'.implode(',', range(1, 29)), new \App\Rules\FloorCheck()],
    'total_floors' => 'required|in:'.implode(',', range(1, 29)),

    'year_built' => 'nullable|in:0,'.implode(',', range(1900, date("Y"), 10)),
    'property_number' => 'nullable|string|min:1|max:30',
    'condition' => 'nullable|in:usual,new,under construction,renovated,needs renovation,good condition,old,well maintained,luxurious',
    'furnishings' => 'nullable|in:empty,semi furnished,furnished',
    'available_from' => 'nullable|date',
    'available_now' => 'nullable|in:1',
    'description' => 'nullable|min:5',

    'elevator' => 'nullable|in:0,1,2,3',
    'parking' => 'nullable|array',
    'parking.*' => 'nullable|in:public out of zone,public in the zone,in the building courtyard',
    'garage' => 'nullable|array',
    'garage.*' => 'nullable|in:within the facility,public',
    'garage_space' => 'nullable|integer|min:1',
    'internet_type' => 'nullable|in:none,ADSL,optical,cable,satellite,wireless',
    'smoking_allowed' => 'nullable|in:0,1',
    'pets_allowed' => 'nullable|in:0,1',
    'suitable' => 'nullable|array',
    'suitable.*' => 'nullable|in:workers,family,students',
    'view' => 'nullable|array',
    'view.*' => 'nullable|in:street,courtyard',

    'room_name' => 'nullable|array',
    'room_name.*' => 'nullable|in:no bathroom,bathroom 1,bathroom 2,bathroom 3+,no toilet,toilet 1,toilet 2,toilet 3+,kitchen,storage,basement,loft',

    'infrastructure_name' => 'nullable|array',
    'infrastructure_name.*' => 'nullable|in:no loggia,loggia 1,loggia 2,loggia 3+,no balcony,balcony 1,balcony 2,balcony 3+,disabled access,courtyard,sauna,fitness,ventilation,central air conditioning,surveillance camera,alarm,reception',

    'equipment_name' => 'nullable|array',
    'equipment_name.*' => 'nullable|in:air conditioning,business furniture,wardrobe,built-in wardrobe,american wardrobe,tv,bed,washing machine,kitchen units,dishwasher,refrigerator,freezer,microwave oven,oven,stove,telephone line,cable',

    'images' => 'nullable|array',
    'images.*' => 'nullable|image|mimes:jpg,png,jpeg|max:5120',
];
