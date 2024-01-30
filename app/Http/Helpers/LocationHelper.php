<?php

namespace App\Http\Helpers;

use App\Models\Location;

class LocationHelper
{
    public static function getLastLocation(Location $location): ?string
    {
        $types = Location::TYPES;

        $lastType = null;

        foreach ($types as $type) {
            if ($location[$type] === null) {
                break;
            }
            $lastType = $type;
        }

        return $lastType;
    }

    public static function titleFormatter(Location $location): string
    {
        $types = Location::TYPES;
        $title = [];

        foreach ($types as $type) {
            if ($location[$type] === null) {
                break;
            }
            array_push($title, $location[$type]['name']);
        }

        return implode(' - ', $title);
    }
}
