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
    public function gallery() {
        $gallery = Gallery::with('state')->get();
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


        if ($request->hasFile('url')) {
            $imagePath = $request->file('url')->store('images', 'public');
        }

        Gallery::create([
            'name' => $request->name,
            'description' => $request->description,
            'url' => $imagePath,
            'user_id' => Auth::id(),
            'status_id' => $request->status_id,
        ]);

        return redirect()->route('galleryAdmin')->with('success', 'Galería registrada exitosamente.');
    }
    public function imageStore(Request $request){

    $request->validate([
        'name' => 'required|string|max:100',
        'description' => 'required|string|max:200',
        'url' => 'required|image',
        'user_id' => 'required|exists:users,id',
        'gallery_id' => 'required|exists:gallery,id',
        'status_id' => 'required|exists:state,id'
    ]);

    if ($request->hasFile('url')) {
        $imagePath = $request->file('url')->store('images', 'public');
    }

    Multimedia::create([
        'name' => $request->name,
        'description' => $request->description,
        'url' => $imagePath,
        'gallery_id' => $request->gallery_id,
        'user_id' => $request->user_id,
        'status_id' => $request->status_id,
    ]);

    return redirect()->route('galleryAdmin')->with('success', 'Imagen registrada exitosamente.');
    }

    public function edit($id) {
        $gallery = gallery::find($id);
        $state = State::all();
        return view('admin.content.editGallery', compact('gallery', 'state'));
    }
    
    public function update(Request $request, $id) {
        $gallery = gallery::find($id);
        $gallery->name = $request->input('name');
        $gallery->description = $request->input('description');
    
        if ($request->hasFile('url')) {
            $gallery->url = $request->file('url')->store('images', 'public');
        }
        
        $gallery->status_id = $request->input('status_id');
        $gallery->save();
        
        return redirect()->route('galleryAdmin')->with('success', 'Registro actualizado correctamente');
    }

    public function destroy($id) {
        $gallery = Gallery::find($id);
        if ($gallery) {
            Storage::disk('public')->delete($gallery->url);
            $gallery->delete();
            return redirect()->route('galleryAdmin')->with('success', 'Galería eliminada correctamente');
        }
        return redirect()->route('galleryAdmin')->with('error', 'Galería no encontrada');
    }

    public function toggleStatus($id) {
        $gallery = Gallery::find($id);
        if ($gallery) {
            $gallery->status_id = $gallery->status_id == 1 ? 2 : 1;
            $gallery->save();
            return redirect()->route('galleryAdmin')->with('success', 'Estado actualizado correctamente');
        }
        return redirect()->route('galleryAdmin')->with('error', 'Galería no encontrada');
    }

    
    
}
