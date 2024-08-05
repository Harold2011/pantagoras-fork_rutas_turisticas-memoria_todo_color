<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productsPersonalized;
use App\Models\Multimedia;
use Illuminate\Support\Facades\Auth;

class ProductsPersonalizedController extends Controller
{
    public function personalized(){
        $multimedia = Multimedia::all();
        return view('buysPersonalized', compact('multimedia'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:200',
            'number' => 'required|string|max:200',
            'multimedia_id' => 'nullable',
            'description' => 'required|string|max:200',
        ]);

        ProductsPersonalized::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'state_id' => 1,  // Asegúrate de usar status_id en lugar de state_id
            'user_id' => Auth::id(),
            'multimedia_id' => $request->multimedia_id,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Solicitud enviada exitosamente.');
    }
}
