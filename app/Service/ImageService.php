<?php


namespace App\Service;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    public function compressAndStore(UploadedFile $image): void
    {
        $compressedImage = Image::make($image->getRealPath())
            ->resize(550, null, function ($constraint) {
                $constraint->aspectRatio();
            });

        $path = 'images/listings/' . $image->hashName();
        Storage::disk('public')->put($path, $compressedImage->encode());
    }
}
