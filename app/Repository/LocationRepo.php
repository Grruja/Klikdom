<?php

namespace App\Repository;

use App\Models\Location;
use Illuminate\Database\Eloquent\Collection;

class LocationRepo
{
    private Location $locationModel;

    public function __construct()
    {
        $this->locationModel = new Location();
    }

    public function getLocations(string $input): Collection
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
