<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function storeNav(){
        
        return view('admin.store.index');
    }
}