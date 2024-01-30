<?php

namespace App\Repository;

use App\Models\ListingInfo;
use Illuminate\Http\Request;

class ListingInfoRepo
{
    private ListingInfo $listingInfoModel;

    public function __construct()
    {
        $this->listingInfoModel = new ListingInfo();
    }

    public function createListingInfo(Request $request, int $listingId): void
    {
        $this->listingInfoModel->create([
            'listing_id' => $listingId,
            'payment_schedule' => $request->get('payment_schedule'),
            'registered' => $request->get('registered'),
            'deposit' => $request->get('deposit'),
            'rooms_number' => $request->get('rooms_number'),
            'floor' => $request->get('floor'),
            'total_floors' => $request->get('total_floors'),
            'storeys_number' => $request->get('storeys_number'),
            'land_area' => $request->get('land_area'),
        ]);
    }
}
