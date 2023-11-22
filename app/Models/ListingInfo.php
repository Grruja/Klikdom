<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingInfo extends Model
{
    protected $table = 'listing_info';

    protected $fillable = [
        'listing_id',
        'payment_schedule',
        'registered',
        'deposit',
        'rooms_number',
        'floor',
        'total_floors',
        'storeys_number',
        'land_area',
    ];
}
