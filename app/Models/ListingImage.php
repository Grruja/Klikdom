<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingImage extends Model
{
    protected $table = 'listing_images';

    protected $fillable = [
        'listing_id',
        'image',
    ];
}
