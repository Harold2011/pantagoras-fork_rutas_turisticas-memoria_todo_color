<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', [LandingController::class, 'welcome'])->name('welcome');
Route::get('/gallery', [LandingController::class, 'gallery'])->name('gallery');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
