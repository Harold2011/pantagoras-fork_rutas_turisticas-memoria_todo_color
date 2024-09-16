<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\route;
use App\Models\state;
use Illuminate\Support\Facades\Storage;

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
        $state = State::all();

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

    public function destroy($id)
    {
        $route = route::find($id);

        $route->delete();
        return redirect()->route('indexRoute')->with('success', 'Ruta eliminada correctamente');
    }

    public function toggleStatus($id) {
        $route = route::find($id);
        if ($route) {
            $route->status_id = $route->status_id == 1 ? 2 : 1;
            $route->save();
            return redirect()->route('indexRoute')->with('success', 'Estado actualizado correctamente');
        }
        return redirect()->route('indexRoute')->with('error', 'Ruta no encontrada');
    }

    public function edit($id) {
        $routes = route::find($id);
        $state = State::all();

        return view('admin.route.edit', compact('state', 'routes'));
    }

    public function updateRoute(Request $request, $id) {
        $route = route::find($id);

        if ($request->hasFile('url')) {
            Storage::disk('public')->delete($route->url);
            $route->url = $request->file('url')->store('images', 'public');
        }
        $route->name = $request->input('name');
        $route->description = $request->input('description');
        $route->contact = $request->input('contact');
        $route->status_id = $request->input('status_id');
        $route->save();

        return redirect()->route('indexRoute')->with('success', 'Ruta actualizada correctamente');
    }
}
