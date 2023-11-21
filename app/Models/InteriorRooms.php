<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteriorRooms extends Model
{
    protected $table = 'interior_rooms';

    protected $fillable = [
        'listing_id',
        'room_name',
    ];
}
