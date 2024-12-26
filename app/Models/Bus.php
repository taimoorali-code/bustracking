<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['bus_number', 'capacity', 'description'];

    // A bus has many bus routes (relationship)
    public function busRoutes()
    {
        return $this->hasMany(BusRoute::class);
    }

    // A bus has many bus trackings (relationship)
    public function busTrackings()
    {
        return $this->hasMany(BusTracking::class);
    }
}

