<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateListingRequest;
use App\Http\Requests\DisplayFormRequest;
use App\Repository\AmenityRepo;
use App\Repository\EquipmentRepo;
use App\Repository\InfrastructureRepo;
use App\Repository\InteriorRoomsRepo;
use App\Repository\ListingDetailsRepo;
use App\Repository\ListingImageRepo;
use App\Repository\ListingInfoRepo;
use App\Repository\ListingRepo;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    private $listingRepo;
    private $listingInfoRepo;
    private $listingDetailsRepo;
    private $amenityRepo;
    private $infrastructureRepo;
    private $interiorRoomsRepo;
    private $equipmentRepo;
    private $listingImageRepo;

    public function __construct()
    {
        $this->listingRepo = new ListingRepo();
        $this->listingInfoRepo = new ListingInfoRepo();
        $this->listingDetailsRepo = new ListingDetailsRepo();
        $this->amenityRepo = new AmenityRepo();
        $this->infrastructureRepo = new InfrastructureRepo();
        $this->interiorRoomsRepo = new InteriorRoomsRepo();
        $this->equipmentRepo = new EquipmentRepo();
        $this->listingImageRepo = new ListingImageRepo();
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
        $floor = $request->get('floor');
        $totalFloors = $request->get('total_floors');

        if (is_numeric($floor) && intval($floor) > intval($totalFloors)) {
            return redirect()->back();
        }

        $listing = $this->listingRepo->createListing($request);
        $this->listingInfoRepo->createListingInfo($request, $listing->id);
        $this->listingDetailsRepo->createListingDetails($request, $listing->id);
        $this->amenityRepo->createAmenity($request, $listing->id);
        $this->infrastructureRepo->createInfrastructure($request, $listing->id);
        $this->interiorRoomsRepo->createInteriorRooms($request, $listing->id);
        $this->equipmentRepo->createEquipment($request, $listing->id);
        $this->listingImageRepo->createListingImage($request, $listing->id);
    }
}
