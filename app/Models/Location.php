<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $fillable = [
        'city_id',
        'district_id',
        'settlement_id',
        'area_id',
        'place_id',
    ];

    public $timestamps = false;

    const TYPES = [
        'city',
        'district',
        'settlement',
        'area',
        'place',
    ];

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function settlement()
    {
        return $this->belongsTo(Settlement::class,'settlement_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }
}
