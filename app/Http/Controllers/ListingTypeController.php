<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisplayFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ListingTypeController extends Controller
{
    public function displayForm(DisplayFormRequest $request) {
        $transaction = $request->get('transaction');
        $property = $request->get('property');

        Session::put('listing_type', [
            'transaction' => $transaction,
            'property' => $property,
        ]);

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
            return view('listing.create.rent_apartment.form');
        }
    }
}
