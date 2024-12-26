<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\BusRouteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them 
| will be assigned to the "web" middleware group.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.drivers.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin routes group
Route::middleware(['auth', 'role:admin,driver'])->group(function () {

    // Manage Drivers
    Route::resource('drivers', DriverController::class);  // Routes for creating, updating, deleting drivers

    // Manage Buses
    Route::resource('buses', BusController::class);  // Routes for creating, updating, deleting buses

    // Manage Routes
    Route::resource('routes', RouteController::class);  // Routes for creating, updating, deleting routes

    // Manage Bus Routes (bus assignments to routes)
    Route::resource('bus-routes', BusRouteController::class);  // Routes for managing bus routes
});

// User Profile Routes (for authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
