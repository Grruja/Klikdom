<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $table = 'amenities';

    protected $fillable = [
        'listing_id',
        'elevator',
        'infrastructure',
        'parking',
        'garage',
        'water_supply',
        'internet_type',
        'smoking_allowed',
        'pets_allowed',
        'additional',
    ];

    protected $casts = [
        'infrastructure' => 'json',
        'parking' => 'json',
        'garage' => 'json',
        'additional' => 'json',
    ];
}
