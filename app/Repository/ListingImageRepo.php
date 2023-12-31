<?php

namespace App\Repository;

use App\Models\ListingImage;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ListingImageRepo
{
    private $listingImageModel;

    public function __construct()
    {
        $this->listingImageModel = new ListingImage();
    }

    public function createListingImage($request, $listingId)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->hashName();
                $image->extension();

                $path = 'images/listings/'.$imageName;

                $compressedImage = Image::make($image->getRealPath())
                    ->resize(150, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                Storage::disk('public')->put($path, $compressedImage->encode());

                $this->listingImageModel->create([
                    'listing_id' => $listingId,
                    'image' => $path,
                ]);
            }
        }
    }
}
