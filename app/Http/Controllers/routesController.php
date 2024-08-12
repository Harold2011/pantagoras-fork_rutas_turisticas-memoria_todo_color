<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\route;

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
}
