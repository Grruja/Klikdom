<?php

namespace App\Repository;

use App\Models\ListingImage;

class ListingImageRepo
{
    private $listingImageModel;

    public function __construct()
    {
        $this->listingImageModel = new ListingImage();
    }

    public function createListingImage($request, $listingId)
    {
        $images = $request->file('images');

        foreach ($images as $image) {
            $url = $image->store('/images/listings', ['disk' => 'public']);

            $this->listingImageModel->create([
                'listing_id' => $listingId,
                'image' => $url,
            ]);
        }
    }
}
