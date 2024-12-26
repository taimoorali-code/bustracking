<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
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

        $driver->update($validated);

        return redirect()->route('admin.drivers.index');
    }

    public function destroy(User $driver)
    {
        $driver->delete();

        return redirect()->route('admin.drivers.index');
    }
}
