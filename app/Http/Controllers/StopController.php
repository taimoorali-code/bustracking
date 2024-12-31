<?php

namespace App\Http\Controllers;

use App\Models\Stop;
use App\Models\Route;
use Illuminate\Http\Request;

class StopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stops = Stop::with('route')->orderBy('sequence')->get();
        return view('admin.stops.index', compact('stops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes = Route::all();
        return view('admin.stops.create', compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'route_id' => 'required|exists:routes,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sequence' => 'required|integer',
        ]);

        Stop::create($validated);
        return redirect()->route('admin.stops.index')->with('success', 'Stop created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stop $stop)
    {
        return view('admin.stops.show', compact('stop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stop $stop)
    {
        $routes = Route::all();
        return view('admin.stops.edit', compact('stop', 'routes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stop $stop)
    {
        $validated = $request->validate([
            'route_id' => 'required|exists:routes,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sequence' => 'required|integer',
        ]);

        $stop->update($validated);
        return redirect()->route('admin.stops.index')->with('success', 'Stop updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stop $stop)
    {
        $stop->delete();
        return redirect()->route('admin.stops.index')->with('success', 'Stop deleted successfully.');
    }
}
