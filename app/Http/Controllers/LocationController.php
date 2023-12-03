<?php

namespace App\Http\Controllers;

use App\Http\Helpers\LocationHelper;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function find($input)
    {
        $locations = Location::with(['city', 'district', 'settlement', 'area', 'place'])
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

        $refactor = $locations->map(function ($location) {
            return [
                'id' => $location->id,
                'allTitles' => [
                    'city' => $location->city,
                    'district' => $location->district,
                    'settlement' => $location->settlement,
                    'area' => $location->area,
                    'place' => $location->place,
                ],
                'search_id' => $location[LocationHelper::getLastLocation($location)]['id'],
                'search_type' => LocationHelper::getLastLocation($location).'_id',
                'search_title' => LocationHelper::titleFormatter($location),
            ];
        });

        return response()->json($refactor);
    }
}
