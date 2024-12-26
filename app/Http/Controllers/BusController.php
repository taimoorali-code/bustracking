<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('admin');  // Ensure only admins can access these routes
    // }

    public function index()
    {
        $buses = Bus::all();
        return view('admin.buses.index', compact('buses'));
    }

    public function create()
    {
        return view('admin.buses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bus_number' => 'required|unique:buses',
            'capacity' => 'required|integer',
        ]);

        Bus::create($validated);

        return redirect()->route('admin.buses.index');
    }

    public function show(Bus $bus)
    {
        return view('admin.buses.show', compact('bus'));
    }

    public function edit(Bus $bus)
    {
        return view('admin.buses.edit', compact('bus'));
    }

    public function update(Request $request, Bus $bus)
    {
        $validated = $request->validate([
            'bus_number' => 'required|unique:buses,bus_number,' . $bus->id,
            'capacity' => 'required|integer',
        ]);

        $bus->update($validated);

        return redirect()->route('admin.buses.index');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();

        return redirect()->route('admin.buses.index');
    }
}
