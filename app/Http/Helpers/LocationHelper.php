<?php

namespace App\Http\Helpers;

class LocationHelper
{
    public static function extractLocation($location)
    {
        $parts = explode('-', $location);

        $trimmedParts = array_map('trim', $parts);

        if (count($trimmedParts) > 2) {
            return $trimmedParts;
        }
        else return null;
    }
}
