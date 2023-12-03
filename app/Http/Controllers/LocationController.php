<?php

namespace App\Http\Controllers;

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

        return response()->json($locations);
    }
}
