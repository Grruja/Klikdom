<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingDetails extends Model
{
    protected $table = 'listing_details';

    protected $fillable = [
        'listing_id',
        'construction_material',
        'year_built',
        'property_number',
        'condition',
        'water_supply'.
        'furnishings',
        'available_from',
        'available_now',
        'description',
    ];
}
