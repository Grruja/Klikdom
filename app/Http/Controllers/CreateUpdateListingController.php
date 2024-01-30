<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateListingRequest;
use App\Repository\AmenityRepo;
use App\Repository\EquipmentRepo;
use App\Repository\InfrastructureRepo;
use App\Repository\InteriorRoomsRepo;
use App\Repository\ListingDetailsRepo;
use App\Repository\ListingImageRepo;
use App\Repository\ListingInfoRepo;
use App\Repository\ListingRepo;

class CreateUpdateListingController extends Controller
{
    private ListingRepo $listingRepo;
    private ListingInfoRepo $listingInfoRepo;
    private ListingDetailsRepo $listingDetailsRepo;
    private AmenityRepo $amenityRepo;
    private InfrastructureRepo $infrastructureRepo;
    private InteriorRoomsRepo $interiorRoomsRepo;
    private EquipmentRepo $equipmentRepo;
    private ListingImageRepo $listingImageRepo;

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

    public function createListing(CreateListingRequest $request): void
    {
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
