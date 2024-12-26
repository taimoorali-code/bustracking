<?php

namespace App\Http\Controllers;

use App\Models\BusRoute;
use Illuminate\Http\Request;

class BusRouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $busRoutes = BusRoute::all();
        return view('admin.bus-routes.index', compact('busRoutes'));
    }

    public function create()
    {
        return view('admin.bus-routes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'route_id' => 'required|exists:routes,id',
        ]);

        BusRoute::create($validated);

        return redirect()->route('admin.bus-routes.index');
    }

    public function show(BusRoute $busRoute)
    {
        return view('admin.bus-routes.show', compact('busRoute'));
    }

    public function edit(BusRoute $busRoute)
    {
        return view('admin.bus-routes.edit', compact('busRoute'));
    }

    public function update(Request $request, BusRoute $busRoute)
    {
        $validated = $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'route_id' => 'required|exists:routes,id',
        ]);

        $busRoute->update($validated);

        return redirect()->route('admin.bus-routes.index');
    }

    public function destroy(BusRoute $busRoute)
    {
        $busRoute->delete();

        return redirect()->route('admin.bus-routes.index');
    }
}
