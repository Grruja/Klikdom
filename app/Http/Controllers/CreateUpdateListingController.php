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

class CreateUpdateListingController extends Controller
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

    public function createListing(CreateListingRequest $request) {
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
