<?php

namespace App\Http\Controllers;
use App\Models\gallery;
use App\Models\state;
use App\Models\Multimedia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery(){
        $gallery = gallery::all();
        $multimedia = Multimedia::all();
        return view('admin.content.index', compact('gallery', 'multimedia'));
    }
    public function imageRegister(){
        $gallery = gallery::all();
        $state = state::all();
        $user = User::role('artista')->get();
        return view('admin.content.registerImage', compact('gallery', 'state', 'user'));
    }
    public function galleryRegister(){
        $state = state::all();
        
        return view('admin.content.registerGallery', compact('state'));
    }
    public function galleryStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:200',
            'url' => 'required|image',
            'status_id' => 'required|exists:state,id'
        ]);

        // Manejar la subida de la imagen
        if ($request->hasFile('url')) {
            $imagePath = $request->file('url')->store('images', 'public');
        }

        // Crear una nueva galería
        Gallery::create([
            'name' => $request->name,
            'description' => $request->description,
            'url' => $imagePath,
            'user_id' => Auth::id(), // Obtener el ID del usuario logeado
            'status_id' => $request->status_id,
        ]);

        // Redirigir a una página de éxito o mostrar un mensaje
        return redirect()->route('galleryAdmin')->with('success', 'Galería registrada exitosamente.');
    }
    public function imageStore(Request $request){
    // Validar los datos del formulario
    $request->validate([
        'name' => 'required|string|max:100',
        'description' => 'required|string|max:200',
        'url' => 'required|image',
        'gallery_id' => 'required|exists:gallery,id',
        'status_id' => 'required|exists:state,id'
    ]);

    // Manejar la subida de la imagen
    if ($request->hasFile('url')) {
        $imagePath = $request->file('url')->store('images', 'public');
    }

    // Crear una nueva entrada de multimedia
    Multimedia::create([
        'name' => $request->name,
        'description' => $request->description,
        'url' => $imagePath,
        'gallery_id' => $request->gallery_id,
        'user_id' => Auth::id(),
        'status_id' => $request->status_id,
    ]);

    // Redirigir a una página de éxito o mostrar un mensaje
    return redirect()->route('galleryAdmin')->with('success', 'Imagen registrada exitosamente.');
    }
}
