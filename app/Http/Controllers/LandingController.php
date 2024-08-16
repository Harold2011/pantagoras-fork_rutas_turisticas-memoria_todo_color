<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
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

    public function app(){
        return view('app');
    }
    
    public function gallery(){
        $gallery = Gallery::all();
        return view('gallery', compact('gallery'));
    }
    
    public function viewGallery($id)
    {
        $multimedia = Multimedia::where('gallery_id', $id)->with('user')->get();
        return view('viewGallery', compact('multimedia'));
    }
    
    public function viewArtists()
    {
        $user = User::role('artista')->get();
        return view('artists', compact('user'));
    }
    
    public function store(){
        $products = products::all();
        return view('store', compact('products'));
    }

    public function viewProduct($id)
    {
        $product = products::with('category')->find($id);
        return view('detailProductClient', compact('product'));
    }

}
