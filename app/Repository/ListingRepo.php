<?php

namespace App\Repository;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ListingRepo
{
    private Listing $listingModel;

    public function __construct()
    {
        $this->listingModel = new Listing();
    }

    public function createListing(Request $request): Listing
    {
        return $this->listingModel->create([
            'user_id' => Auth::id(),
            'transaction' => Session::get('listing_type.transaction'),
            'property' => Session::get('listing_type.property'),
            'property_type' => $request->get('property_type'),
            'location_id' => $request->get('location_id'),
            'street' => $request->get('street'),
            'price' => $request->get('price'),
            'property_area' => $request->get('property_area'),
            'heating' => $request->get('heating'),
        ]);
    }
}
