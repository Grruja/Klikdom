<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $table = 'listings';

    protected $fillable = [
        'user_id',
        'transaction',
        'property',
        'property_type',
        'location_id',
        'street',
        'price',
        'property_area',
        'heating',
    ];
}
