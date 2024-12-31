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
            ->with(['route.stops', 'bus'])
            ->first();

        // if (!$busRoute) {
        //     return redirect()->back()->with('error', 'No active route assigned.');
        // }

        $bustracking = BusTracking::where('bus_id', $busRoute->bus->id)
            ->get()
            ->keyBy('stop_id'); // Key by stop_id for easy lookup

        return view('driver.route', compact('busRoute', 'bustracking'));
    }
    public function updateStopStatus(Request $request, $stopId)
    {
        // dd($request->all());
        // Validate request inputs
        $request->validate([
            'status' => 'required',
            'bus_id' => 'required|exists:buses,id',
            'stop_id' => 'required|exists:stops,id',
        ]);

        // Calculate the estimated arrival time if provided
        $estimatedArrivalTime = $this->calculateEstimatedArrivalTime($request->estimated_arrival_time);

        // Update or create the record
        BusTracking::updateOrCreate(
            [
                'bus_id' => $request->bus_id,
                'stop_id' => $stopId, // Search conditions
            ],
            [
                'status' => $request->status, // Values to update
                'estimated_arrival_time' => $estimatedArrivalTime,
            ]
        );

        return redirect()->back()->with('success', 'Stop status updated successfully.');
    }

    protected function calculateEstimatedArrivalTime($timeInput)
    {
        // Define allowed values and their corresponding minutes
        $allowedTimes = [
            '15' => 15,
            '30' => 30,
            '60' => 60,
            '120' => 120,
        ];

        if (isset($allowedTimes[$timeInput])) {
            return now()->addMinutes($allowedTimes[$timeInput]);
        }

        return null; // Return null if the input is invalid or not in the allowed list
    }

    public function activateRoute($routeId)
    {
        $busRoute = BusRoute::where('id', $routeId)
            ->where('user_id', Auth::id())
            ->first();

        if (!$busRoute) {
            return redirect()->back()->with('error', 'You are not assigned to this route.');
        }

        // Toggle the is_active status
        $busRoute->update(['is_active' => !$busRoute->is_active]);

        $message = $busRoute->is_active ? 'Route activated.' : 'Route deactivated.';
        return redirect()->route('driver.viewRoute')->with('success', $message);
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
