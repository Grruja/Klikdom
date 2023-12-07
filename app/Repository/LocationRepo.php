<?php

namespace App\Repository;

use App\Models\Location;

class LocationRepo
{
    private $locationModel;

    public function __construct()
    {
        $this->locationModel = new Location();
    }

    public function getLocations($input)
    {
        return $this->locationModel->with(['city', 'district', 'settlement', 'area', 'place'])
            ->whereHas('city', function ($query) use ($input) {
                $query->where('name', 'like', "%$input%");

            })->orWhereHas('district', function ($query) use ($input) {
                $query->where('name', 'like', "%$input%");

            })->orWhereHas('settlement', function ($query) use ($input) {
                $query->where('name', 'like', "%$input%");

            })->orWhereHas('area', function ($query) use ($input) {
                $query->where('name', 'like', "%$input%");

            })->orWhereHas('place', function ($query) use ($input) {
                $query->where('name', 'like', "%$input%");

            })->get();
    }
}
