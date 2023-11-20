<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingDetails extends Model
{
    protected $table = 'listings_details';

    protected $fillable = [
        'listing_id',
        'furnishings',
        'condition',
        'year_built',
        'registered',
        'deposit',
        'payment_schedule',
        'available_from',
        'description',
    ];
}
