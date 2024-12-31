<?php

namespace App\Http\Controllers;

use App\Models\BusRoute;
use App\Models\BusTracking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('admin');  // Ensure only admins can access these routes
    // }

    public function index()
    {
        $drivers = User::where('role', 'driver')->get();
        return view('admin.drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('admin.drivers.create');
    }
    public function viewRoute()
    {
        $busRoute = BusRoute::where('user_id', Auth::id())
            // ->where('is_active', true)
            ->with('route.stops')
            ->first();
            // dd($busRoute);

        if (!$busRoute) {
            return redirect()->back()->with('error', 'No active route assigned.');
        }
        return view('driver.route', compact('busRoute'));
    }
    public function updateStopStatus(Request $request, $stopId)
    {
        $request->validate([
            'status' => 'required|in:arrived,departed',
        ]);

        $busTracking = BusTracking::updateOrCreate(
            [
                'bus_id' => $request->bus_id,
                'stop_id' => $stopId,
            ],
            [
                'status' => $request->status,
                'estimated_arrival_time' => now(), // Can be adjusted for actual time tracking
            ]
        );

        return redirect()->back()->with('success', 'Stop status updated successfully.');
    }
    public function activateRoute($routeId)
    {
        $busRoute = BusRoute::where('route_id', $routeId)
            ->where('driver_id', Auth::id())
            ->first();

        if (!$busRoute) {
            return redirect()->back()->with('error', 'You are not assigned to this route.');
        }

        $busRoute->update(['is_active' => true]);

        return redirect()->route('driver.viewRoute')->with('success', 'Route activated.');
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'driver',
        ]);

        return redirect()->route('admin.drivers.index');
    }

    public function show(User $driver)
    {
        return view('admin.drivers.show', compact('driver'));
    }

    public function edit(User $driver)
    {
        return view('admin.drivers.edit', compact('driver'));
    }
    public function update(Request $request, User $driver)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $driver->id,
            'password' => 'nullable|string|min:8',
        ]);

        // Remove password from validated data if it's empty
        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            // Hash the password before updating
            $validated['password'] = bcrypt($validated['password']);
        }

        $driver->update($validated);

        return redirect()->route('admin.drivers.index')->with('success', 'Driver updated successfully.');
    }


    public function destroy(User $driver)
    {
        $driver->delete();

        return redirect()->route('admin.drivers.index');
    }
}
