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
        'parking',
        'garage',
        'internet_type',
        'smoking_allowed',
        'pets_allowed',
        'additional',
    ];

    protected $casts = [
        'parking' => 'json',
        'garage' => 'json',
        'additional' => 'json',
    ];
}
