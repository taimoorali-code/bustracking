<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\BusRoute;
use App\Models\Route;
use App\Models\User; // Use the User model
use Illuminate\Http\Request;

class BusRouteController extends Controller
{
    public function index()
    {
        // Eager load 'user' as driver in the BusRoute model
        $busRoutes = BusRoute::with(['bus', 'route', 'driver'])->get();
        return view('admin.bus-routes.index', compact('busRoutes'));
    }

    public function create()
    {
        $buses = Bus::all();
        $routes = Route::all();
        // Fetch users with the 'driver' role for assignment
        $drivers = User::where('role', 'driver')->get();
        return view('admin.bus-routes.create', compact('buses', 'routes', 'drivers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'route_id' => 'required|exists:routes,id',
            'user_id' => [
                'required',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    if (BusRoute::where('user_id', $value)->exists()) {
                        $fail('The selected driver is already assigned to another route.');
                    }
                },
            ],
        ]);
    
        BusRoute::create($validated);
    
        return redirect()->route('admin.bus-routes.index')->with('success', 'Bus route created successfully!');
    }
    
    public function show(BusRoute $busRoute)
    {
        return view('admin.bus-routes.show', compact('busRoute'));
    }

    public function edit(BusRoute $busRoute)
    {
        $buses = Bus::all();
        $routes = Route::all();
        // Fetch users with the 'driver' role for assignment
        $drivers = User::where('role', 'driver')->get();
        return view('admin.bus-routes.edit', compact('busRoute', 'buses', 'routes', 'drivers'));
    }

    public function update(Request $request, BusRoute $busRoute)
    {
        $validated = $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'route_id' => 'required|exists:routes,id',
            'user_id' => [
                'required',
                'exists:users,id',
                function ($attribute, $value, $fail) use ($busRoute) {
                    if (BusRoute::where('user_id', $value)->where('id', '!=', $busRoute->id)->exists()) {
                        $fail('The selected driver is already assigned to another route.');
                    }
                },
            ],
        ]);
    
        $busRoute->update($validated);
    
        return redirect()->route('admin.bus-routes.index')->with('success', 'Bus route updated successfully!');
    }
    

    public function destroy(BusRoute $busRoute)
    {
        $busRoute->delete();

        return redirect()->route('admin.bus-routes.index');
    }
}
