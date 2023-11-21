<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingInfo extends Model
{
    protected $table = 'listing_info';

    protected $fillable = [
        'listing_id',
        'property_number',
        'construction_material',
        'heating',
        'rooms_number',
        'floor',
        'total_floors',
        'storeys_number',
    ];
}
