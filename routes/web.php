<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\BusRouteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StopController;
use App\Http\Controllers\StudentController;
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

Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/route/{id}', [StudentController::class, 'viewRouteDetails'])->name('student.routeDetails');



Route::get('/dashboard', function () {
    return redirect()->route('admin.drivers.index');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

// Admin routes group
Route::middleware(['auth', 'role:admin'])->group(function () {

    // Manage Drivers
    Route::resource('drivers', DriverController::class)->names([
        'index' => 'admin.drivers.index',
        'create' => 'drivers.create',
        'store' => 'drivers.store',
        'show' => 'drivers.show',
        'edit' => 'drivers.edit',
        'update' => 'drivers.update',
        'destroy' => 'drivers.destroy',
    ]);

    // Manage Buses
    Route::resource('buses', BusController::class)->names([
        'index' => 'admin.buses.index',
        'create' => 'buses.create',
        'store' => 'buses.store',
        'show' => 'buses.show',
        'edit' => 'buses.edit',
        'update' => 'buses.update',
        'destroy' => 'buses.destroy',
    ]);

    // Manage Routes
    Route::resource('routes', RouteController::class)->names([
        'index' => 'admin.routes.index',
        'create' => 'routes.create',
        'store' => 'routes.store',
        'show' => 'routes.show',
        'edit' => 'routes.edit',
        'update' => 'routes.update',
        'destroy' => 'routes.destroy',
    ]);

    // Manage Bus Routes (bus assignments to routes)
    Route::resource('bus-routes', BusRouteController::class)->names([
        'index' => 'admin.bus-routes.index',
        'create' => 'bus-routes.create',
        'store' => 'bus-routes.store',
        'show' => 'bus-routes.show',
        'edit' => 'bus-routes.edit',
        'update' => 'bus-routes.update',
        'destroy' => 'bus-routes.destroy',
    ]);
    Route::resource('stops', StopController::class)->names([
        'index' => 'admin.stops.index',
        'create' => 'stops.create',
        'store' => 'stops.store',
        'show' => 'stops.show',
        'edit' => 'stops.edit',
        'update' => 'stops.update',
        'destroy' => 'stops.destroy',
    ]);
    
});

// User Profile Routes (for authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:driver'])->group(function () {
    Route::get('/driver/route', [DriverController::class, 'viewRoute'])->name('driver.viewRoute');
    Route::post('/driver/stop/{stopId}/update', [DriverController::class, 'updateStopStatus'])->name('driver.updateStopStatus');
    Route::post('/driver/route/{routeId}/activate', [DriverController::class, 'activateRoute'])->name('driver.activateRoute');
});

require __DIR__.'/auth.php';
