<?php

namespace App\Http\Helpers;

use App\Models\Location;

class LocationHelper
{
    public static function getLastLocation($location)
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

    public static function titleFormatter($location)
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
