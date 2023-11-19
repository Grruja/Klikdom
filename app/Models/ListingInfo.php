<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingInfo extends Model
{
    protected $table = 'listings_info';

    protected $fillable = [
        'property_id',
        'property_number',
        'construction_material',
        'heating',
        'rooms_number',
        'storeys_number',
        'floor',
        'total_floors',
    ];
}
