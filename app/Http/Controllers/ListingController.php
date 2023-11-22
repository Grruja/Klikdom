<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateListingRequest;
use App\Http\Requests\DisplayFormRequest;
use App\Models\Amenity;
use App\Models\Equipment;
use App\Models\Infrastructure;
use App\Models\InteriorRooms;
use App\Models\Listing;
use App\Models\ListingDetails;
use App\Models\ListingInfo;
use Illuminate\Support\Facades\Auth;
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

    public function createListing(CreateListingRequest $request) {
        dd($request->all());
    }
}
