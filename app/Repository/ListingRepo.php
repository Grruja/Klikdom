<?php

namespace App\Repository;

use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ListingRepo
{
    private $listingModel;

    public function __construct()
    {
        $this->listingModel = new Listing();
    }

    public function createListing($request)
    {
        return $this->listingModel->create([
            'user_id' => Auth::id(),
            'transaction' => Session::get('listing_type.transaction'),
            'property' => Session::get('listing_type.property'),
            'property_type' => $request->get('property_type'),
            'location' => $request->get('location'),
            'street' => $request->get('street'),
            'price' => $request->get('price'),
            'property_area' => $request->get('property_area'),
            'heating' => $request->get('heating'),
        ]);
    }
}
