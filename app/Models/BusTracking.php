<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusTracking extends Model
{
    use HasFactory;

    protected $fillable = ['bus_id', 'stop_id', 'status', 'estimated_arrival_time'];

    // A bus tracking belongs to a bus (relationship)
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    // A bus tracking belongs to a stop (relationship)
    public function stop()
    {
        return $this->belongsTo(Stop::class);
    }
}
