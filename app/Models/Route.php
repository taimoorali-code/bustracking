<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // A route has many bus routes (relationship)
    public function busRoutes()
    {
        return $this->hasMany(BusRoute::class);
    }

    // A route has many stops (relationship)
    public function stops()
    {
        return $this->hasMany(Stop::class);
    }
}
