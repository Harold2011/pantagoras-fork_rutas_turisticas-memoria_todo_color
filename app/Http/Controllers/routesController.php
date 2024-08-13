<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\route;
use App\Models\state;

class routesController extends Controller
{
    public function index()
    {
        $route = route::all();

        return view('admin.route.index', compact('route'));
    }

    public function indexLanding()
    {
        $route = route::all();

        return view('route', compact('route'));
    }

    public function registerRoute()
    {
        $state = state::all();

        return view('admin.route.register', compact('state'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required',
            'contact' => 'required',
            'url' => 'required|image',
            'status_id' => 'required',
        ]);

        if ($request->hasFile('url')) {
            $imagePath = $request->file('url')->store('images', 'public');
        }

        route::create([
            'name' => $request->name,
            'description' => $request->description,
            'contact' => $request->contact,
            'url' => $imagePath,
            'status_id' => $request->status_id,
        ]);

        return redirect()->route('indexRoute')->with('success', 'Solicitud enviada exitosamente.');
    }
}
