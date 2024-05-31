<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\GalleryController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', [LandingController::class, 'welcome'])->name('welcome');
Route::get('/gallery', [LandingController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{id}', [LandingController::class, 'viewGallery'])->name('viewGallery');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    //rutas de contenido gallery and images
    Route::get('/galleryAdmin', [GalleryController::class, 'gallery'])->name('galleryAdmin');
    Route::get('/imageRegister', [GalleryController::class, 'imageRegister'])->name('imageRegister');
    Route::get('/galleryRegister', [GalleryController::class, 'galleryRegister'])->name('galleryRegister');
    Route::post('/galleryStore', [GalleryController::class, 'galleryStore'])->name('galleryStore');
    Route::post('/imageStore', [GalleryController::class, 'imageStore'])->name('imageStore');
});
