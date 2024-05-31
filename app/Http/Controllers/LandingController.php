<?php

namespace App\Http\Controllers;
use App\Models\gallery;
use App\Models\Multimedia;

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
}
