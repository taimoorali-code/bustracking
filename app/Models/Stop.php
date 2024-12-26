<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    use HasFactory;

    protected $fillable = ['route_id', 'name', 'description', 'sequence'];

    // A stop belongs to a route (relationship)
    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    // A stop has many bus trackings (relationship)
    public function busTrackings()
    {
        return $this->hasMany(BusTracking::class);
    }
}
