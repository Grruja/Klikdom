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
use Illuminate\Http\Request;
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
        $listing = Listing::create([
            'user_id' => Auth::id(),
            'transaction' => Session::get('listing_type.transaction'),
            'property' => Session::get('listing_type.property'),
            'property_type' => $request->get('property_type'),
            'location' => $request->get('location'),
            'street' => $request->get('street'),
            'price' => $request->get('price'),
            'property_area' => $request->get('property_area'),
            'land_area' => $request->get('land_area'),
        ]);

        ListingInfo::create([
            'listing_id' => $listing->id,
            'property_number' => $request->get('property_number'),
            'construction_material' => $request->get('construction_material'),
            'heating' => $request->get('heating'),
            'rooms_number' => $request->get('rooms_number'),
            'floor' => $request->get('floor'),
            'total_floors' => $request->get('total_floors'),
            'storeys_number' => $request->get('storeys_number'),
        ]);

        ListingDetails::create([
            'listing_id' => $listing->id,
            'furnishings' => $request->get('furnishings'),
            'condition' => $request->get('condition'),
            'year_built' => $request->get('year_built'),
            'registered' => $request->get('registered'),
            'deposit' => $request->get('deposit'),
            'payment_schedule' => $request->get('payment_schedule'),
            'available_from' => $request->get('available_from'),
            'available_now' => $request->get('available_now'),
            'description' => $request->get('description'),
        ]);

        Amenity::create([
            'listing_id' => $listing->id,
            'elevator' => $request->get('elevator'),
            'parking' => $request->get('parking'),
            'garage' => $request->get('garage'),
            'water_supply' => $request->get('water_supply'),
            'internet_type' => $request->get('internet_type'),
            'smoking_allowed' => $request->get('smoking_allowed'),
            'pets_allowed' => $request->get('pets_allowed'),
            'additional' => [
                'suitable' => $request->get('suitable'),
                'view' => $request->get('view'),
            ],
        ]);

        $infrastructure_name = $request->get('infrastructure_name');
        if (count($infrastructure_name) > 0) {
            foreach ($infrastructure_name as $item) {
                Infrastructure::create([
                    'listing_id' => $listing->id,
                    'infrastructure_name' => $item,
                ]);
            }
        }

        $room_name = $request->get('room_name');
        if (count($room_name) > 0) {
            foreach ($room_name as $item) {
                InteriorRooms::create([
                    'listing_id' => $listing->id,
                    'room_name' => $item,
                ]);
            }
        }

        $equipment_name = $request->get('equipment_name');
        if (count($equipment_name) > 0) {
            foreach ($equipment_name as $item) {
                Equipment::create([
                    'listing_id' => $listing->id,
                    'equipment_name' => $item,
                ]);
            }
        }

    }
}
