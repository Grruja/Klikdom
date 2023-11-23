<?php

namespace App\Repository;

use App\Models\Amenity;

class AmenityRepo
{
    private $amenityModel;

    public function __construct()
    {
        $this->amenityModel = new Amenity();
    }

    public function createAmenity($request, $listingId)
    {
        $amenityColumns = $this->amenityModel->getFillable();
        array_pop($amenityColumns);
        array_push($amenityColumns, 'suitable', 'view');

        $hasValue = false;

        foreach ($amenityColumns as $column) {
            if (!empty($request->get($column))) {
                $hasValue = true;
                break;
            }
        }

        if ($hasValue) {
            $this->amenityModel->create([
                'listing_id' => $listingId,
                'elevator' => $request->get('elevator'),
                'parking' => $request->get('parking'),
                'garage' => $request->get('garage'),
                'water_supply' => $request->get('water_supply'),
                'internet_type' => $request->get('internet_type'),
                'smoking_allowed' => $request->get('smoking_allowed'),
                'pets_allowed' => $request->get('pets_allowed'),
                'additional' => [
                    'suitable' => $request->get('suitable'),
                    'view' => $request->get('view'),
                ],
            ]);
        }
    }
}
