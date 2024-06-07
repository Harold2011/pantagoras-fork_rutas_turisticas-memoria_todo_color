<?php

namespace App\Http\Controllers;
use App\Models\gallery;
use App\Models\Multimedia;
use App\Models\User;
use App\Models\products;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    public function gallery(){
        $gallery = gallery::all();
        return view('gallery', compact('gallery'));
    }
    public function viewGallery($id)
    {
        $multimedia = Multimedia::where('gallery_id', $id)->with('user')->get();
       return view('viewGallery', compact('multimedia'));
    }
    public function viewartists()
    {
        $user = User::role('artista')->get();
       return view('artists', compact('user'));
    }
    public function store(){
        $products = products::all();
        return view('store', compact('products'));
    }
}
