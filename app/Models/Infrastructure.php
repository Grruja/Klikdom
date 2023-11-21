<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    protected $table = 'infrastructure';

    protected $fillable = [
        'listing_id',
        'infrastructure_name',
    ];
}
