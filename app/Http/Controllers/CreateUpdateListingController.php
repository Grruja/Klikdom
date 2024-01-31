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
use App\Service\ImageService;

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
    private ImageService $imageService;

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
        $this->imageService = new ImageService();
    }

    public function createListing(CreateListingRequest $request): void
    {
        $listingId = $this->listingRepo->createListingReturnId($request);
        $this->listingInfoRepo->createListingInfo($request, $listingId);
        $this->listingDetailsRepo->createListingDetails($request, $listingId);
        $this->amenityRepo->createAmenity($request, $listingId);
        $this->infrastructureRepo->createInfrastructure($request->get('infrastructure_name'), $listingId);
        $this->interiorRoomsRepo->createInteriorRooms($request->get('room_name'), $listingId);
        $this->equipmentRepo->createEquipment($request->get('equipment'), $listingId);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $this->imageService->compressAndStore($image);
            }
            $this->listingImageRepo->createListingImage($request, $listingId);
        }
    }
}
