<?php

namespace App\Http\Controllers;

use App\Models\BusRoute;
use App\Models\BusTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    /**
     * Show the student dashboard with bus routes.
     */
    public function index()
    {
        // $busRoute = BusRoute::with(['route', 'bus', 'driver'])->first();
        $busRoutes = BusRoute::with(['bus', 'route', 'driver'])->get();

        // dd($busRoute);
         return view('student.index', compact('busRoutes'));
    }
    public function viewRouteDetails($id)
{
    // Find the specific bus route
    $busRoute = BusRoute::with(['route.stops', 'bus'])->findOrFail($id);

    // Fetch tracking details for this route
    $busTrackings = BusTracking::where('bus_id', $busRoute->bus->id)
        ->with('stop') // Load related stops
        ->get();

    // Determine which stops are crossed or pending
    $stopsStatus = $busRoute->route->stops->map(function ($stop) use ($busTrackings) {
        $tracking = $busTrackings->firstWhere('stop_id', $stop->id);

        return [
            'stop' => $stop,
            'status' => $tracking->status ?? 'pending',
            'estimated_arrival_time' => $tracking->estimated_arrival_time ?? null,
        ];
    });

    return view('student.route-details', compact('busRoute', 'stopsStatus'));
}
}
