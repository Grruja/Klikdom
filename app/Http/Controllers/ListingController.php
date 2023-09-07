<?php

namespace App\Http\Controllers;

use App\Http\Requests\displayFormRequest;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function displayForm(displayFormRequest $request) {
        $transaction = $request->get('transaction');
        $realEstate = $request->get('real_estate');

        if ($transaction === 'sell' && $realEstate === 'house') {
            return view('listing.create.sellHouseForm');
        }
        else if ($transaction === 'sell' && $realEstate === 'apartment') {
            return view('listing.create.sellApartmentForm');
        }
        else if ($transaction === 'rent' && $realEstate === 'house') {
            return view('listing.create.rentHouseForm');
        }
        else {
            return view('listing.create.rentApartmentForm');
        }
    }
}
