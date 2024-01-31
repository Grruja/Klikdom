<?php

namespace App\Repository;

use App\Models\ListingImage;
use Illuminate\Http\Request;

class ListingImageRepo
{
    private ListingImage $listingImageModel;

    public function __construct()
    {
        $this->listingImageModel = new ListingImage();
    }

    public function createListingImage(Request $request, int $listingId): void
    {
        foreach ($request->file('images') as $image) {
            $this->listingImageModel->create([
                'listing_id' => $listingId,
                'image' => 'images/listings/' . $image->hashName(),
            ]);
        }
    }
}
