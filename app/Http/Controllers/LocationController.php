<?php

namespace App\Http\Controllers;

use App\Http\Helpers\LocationHelper;
use App\Repository\LocationRepo;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    private $locationRepo;

    public function __construct()
    {
        $this->locationRepo = new LocationRepo();
    }

    public function getLocations($input)
    {
        $locations = $this->locationRepo->getLocations($input);

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
