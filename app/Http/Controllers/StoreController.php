<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\state;
use App\Models\category;
use App\Models\products;

class StoreController extends Controller
{
    public function storeNav(){
        
        return view('admin.store.index');
    }

    public function store(){
        $products = products::all();
        return view('admin.store.store', compact('products'));
    }

    public function registerProduct(){
        $category = category::all();
        $state = state::all();
        return view('admin.store.registerProduct', compact('category', 'state'));
    }
    public function productStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:200',
            'price' => 'required',
            'amount' => 'required',
            'url' => 'required|image',
            'status_id' => 'required|exists:state,id',
            'category_id' => 'required|exists:category,id'
        ]);

        // Manejar la subida de la imagen
        if ($request->hasFile('url')) {
            $imagePath = $request->file('url')->store('images', 'public');
        }

        // Crear una nueva galería
        products::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'amount' => $request->amount,
            'url' => $imagePath,
            'status_id' => $request->status_id,
            'category_id' => $request->category_id,
        ]);

        // Redirigir a una página de éxito o mostrar un mensaje
        return redirect()->route('store')->with('success', 'Producto registrado exitosamente.');
    }
}
