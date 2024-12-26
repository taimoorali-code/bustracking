<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'role'];

    protected $hidden = ['password', 'remember_token'];

    // A user can have many bus routes (if they are a driver)
    public function busRoutes()
    {
        return $this->hasMany(BusRoute::class, 'driver_id');
    }

    // Role check for easier management
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isDriver()
    {
        return $this->role === 'driver';
    }

    public function isStudent()
    {
        return $this->role === 'student';
    }
}
