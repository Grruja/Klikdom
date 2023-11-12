<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateListingRequest;
use App\Http\Requests\DisplayFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    public function displayForm(DisplayFormRequest $request) {
        $transaction = $request->get('transaction');
        $property = $request->get('property');

        Session::put('listing_type', [
            'transaction' => $transaction,
            'property' => $property,
        ]);

        if ($transaction === 'prodaja' && $property === 'kuća') {
            return view('listing.create.sellHouseForm');
        }
        else if ($transaction === 'prodaja' && $property === 'stan') {
            return view('listing.create.sellApartmentForm');
        }
        else if ($transaction === 'izdavanje' && $property === 'kuća') {
            return view('listing.create.rentHouseForm');
        }
        else {
            return view('listing.create.rentApartmentForm');
        }
    }

    public function createListing(CreateListingRequest $request) {
        dd($request->all());
    }
}
