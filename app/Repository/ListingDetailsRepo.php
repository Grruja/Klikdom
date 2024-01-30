<?php

namespace App\Repository;

use App\Models\ListingDetails;
use Illuminate\Http\Request;
use function League\Flysystem\has;

class ListingDetailsRepo
{
    private ListingDetails $listingDetailsModel;

    public function __construct()
    {
        $this->listingDetailsModel = new ListingDetails();
    }

    public function createListingDetails(Request $request, int $listingId): void
    {
        $listingDetailsColumns = $this->listingDetailsModel->getFillable();
        $hasValue = false;

        foreach ($listingDetailsColumns as $column) {
            if (!empty($request->get($column))) {
                $hasValue = true;
                break;
            }
        }

        if ($hasValue) {
            $this->listingDetailsModel->create([
                'listing_id' => $listingId,
                'construction_material' => $request->get('construction_material'),
                'year_built' => $request->get('year_built'),
                'property_number' => $request->get('property_number'),
                'condition' => $request->get('condition'),
                'water_supply' => $request->get('water_supply'),
                'furnishings' => $request->get('furnishings'),
                'available_from' => $request->get('available_from'),
                'available_now' => $request->get('available_now'),
                'description' => $request->get('description'),
            ]);
        }
    }
}
