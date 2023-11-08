<?php

namespace App\Http\Controllers;

use App\Http\Requests\displayFormRequest;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function displayForm(displayFormRequest $request) {
        $transaction = $request->get('transaction');
        $property = $request->get('property');

        if ($transaction === 'sell' && $property === 'house') {
            return view('listing.create.sellHouseForm');
        }
        else if ($transaction === 'sell' && $property === 'apartment') {
            return view('listing.create.sellApartmentForm');
        }
        else if ($transaction === 'rent' && $property === 'house') {
            return view('listing.create.rentHouseForm');
        }
        else {
            return view('listing.create.rentApartmentForm');
        }
    }
}
