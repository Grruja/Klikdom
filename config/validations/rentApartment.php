<?php

return [
    'property_type' => 'required|in:' . implode(',', config('enumOptions.listings.property_type')),
    'location_id' => 'required|integer|min:1',
    'street' => 'required|string|min:3|max:255',
    'price' => 'required|integer|min:1',
    'property_area' => 'required|integer|min:1',
    'heating' => 'required|in:' . implode(',', config('enumOptions.listings.heating')),

    'payment_schedule' => 'required|in:1,30,90,180,365',
    'registered' => 'nullable|in:' . implode(',', config('enumOptions.listing_info.registered')),
    'deposit' => 'nullable|integer|min:1',
    'rooms_number' => 'required|in:' . implode(',', config('enumOptions.listing_info.rooms_number')),
    'floor' => ['required', 'in:' . implode(',', config('enumOptions.listing_info.floor')), new \App\Rules\FloorCheck()],
    'total_floors' => 'required|in:'.implode(',', range(1, 29)),

    'year_built' => 'nullable|in:' . implode(',', config('enumOptions.listing_details.year_built')),
    'property_number' => 'nullable|string|min:1|max:30',
    'condition' => 'nullable|in:' . implode(',', config('enumOptions.listing_details.condition')),
    'furnishings' => 'nullable|in:' . implode(',', config('enumOptions.listing_details.furnishings')),
    'available_from' => 'nullable|date',
    'available_now' => 'nullable|in:1',
    'description' => 'nullable|min:5',

    'elevator' => 'nullable|in:0,1,2,3',
    'parking' => 'nullable|array',
    'parking.*' => 'nullable|in:public out of zone,public in the zone,in the building courtyard',
    'garage' => 'nullable|array',
    'garage.*' => 'nullable|in:within the facility,public',
    'garage_space' => 'nullable|integer|min:1',
    'internet_type' => 'nullable|in:' . implode(',', config('enumOptions.amenities.internet_type')),
    'smoking_allowed' => 'nullable|in:0,1',
    'pets_allowed' => 'nullable|in:0,1',
    'suitable' => 'nullable|array',
    'suitable.*' => 'nullable|in:workers,family,students',
    'view' => 'nullable|array',
    'view.*' => 'nullable|in:street,courtyard',

    'room_name' => 'nullable|array',
    'room_name.*' => 'nullable|in:' . implode(',', config('enumOptions.interior_rooms.room_name')),

    'infrastructure_name' => 'nullable|array',
    'infrastructure_name.*' => 'nullable|in:' . implode(',', config('enumOptions.infrastructures.infrastructure_name')),

    'equipment_name' => 'nullable|array',
    'equipment_name.*' => 'nullable|in:' . implode(',', config('enumOptions.equipments.equipment_name')),

    'images' => 'nullable|array',
    'images.*' => 'nullable|image|mimes:jpg,png,jpeg|max:5120',
];
