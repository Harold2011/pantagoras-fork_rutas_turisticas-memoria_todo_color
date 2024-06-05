<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\state;
use App\Models\category;

class StoreController extends Controller
{
    public function storeNav(){
        
        return view('admin.store.index');
    }

    public function store(){
        
        return view('admin.store.store');
    }

    public function registerProduct(){
        $category = category::all();
        $state = state::all();
        return view('admin.store.registerProduct', compact('category', 'state'));
    }
}
