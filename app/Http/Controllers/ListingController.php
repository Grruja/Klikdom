<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateListingRequest;
use App\Http\Requests\DisplayFormRequest;
use App\Repository\ListingDetailsRepo;
use App\Repository\ListingInfoRepo;
use App\Repository\ListingRepo;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    private $listingRepo;
    private $listingInfoRepo;
    private $listingDetailsRepo;

    public function __construct()
    {
        $this->listingRepo = new ListingRepo();
        $this->listingInfoRepo = new ListingInfoRepo();
        $this->listingDetailsRepo = new ListingDetailsRepo();
    }

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
        $listing = $this->listingRepo->createListing($request);
        $this->listingInfoRepo->createListingInfo($request, $listing->id);
        $this->listingDetailsRepo->createListingDetails($request, $listing->id);
    }
}
