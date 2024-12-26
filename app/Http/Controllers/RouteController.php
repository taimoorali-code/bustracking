<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }

    public function index()
    {
        $routes = Route::all();
        return view('admin.routes.index', compact('routes'));
    }

    public function create()
    {
        return view('admin.routes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:routes',
        ]);

        Route::create($validated);

        return redirect()->route('admin.routes.index');
    }

    public function show(Route $route)
    {
        return view('admin.routes.show', compact('route'));
    }

    public function edit(Route $route)
    {
        return view('admin.routes.edit', compact('route'));
    }

    public function update(Request $request, Route $route)
    {
        $validated = $request->validate([
            'name' => 'required|unique:routes,name,' . $route->id,
        ]);

        $route->update($validated);

        return redirect()->route('admin.routes.index');
    }

    public function destroy(Route $route)
    {
        $route->delete();

        return redirect()->route('admin.routes.index');
    }
}
