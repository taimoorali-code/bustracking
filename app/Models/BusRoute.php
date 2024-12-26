<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    use HasFactory;

    protected $fillable = ['bus_id', 'route_id', 'is_active'];

    // A bus route belongs to a bus (relationship)
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    // A bus route belongs to a route (relationship)
    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
