<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;

//rutas inicio
Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', [LandingController::class, 'welcome'])->name('welcome');

//rutas galeria
Route::get('/gallery', [LandingController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{id}', [LandingController::class, 'viewGallery'])->name('viewGallery');

//rutas artistas
Route::get('/artists', [LandingController::class, 'viewartists'])->name('artists');

//ruta tienda
Route::get('/storeUser', [LandingController::class, 'store'])->name('storeUser');

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

    //rutas de usuarios
    Route::get('/users', [UserController::class, 'index'])->name('usersIndex');
    Route::post('/users/make-artist/{id}', [UserController::class, 'makeArtist'])->name('usersMakeArtist');
    Route::post('/users/make-user/{id}', [UserController::class, 'makeUser'])->name('usersMakeUser');

    //rutas tienda
    Route::get('/storeNav', [StoreController::class, 'storeNav'])->name('storeNav');
    Route::get('/store', [StoreController::class, 'store'])->name('store');
    Route::get('/registerProduct', [StoreController::class, 'registerProduct'])->name('registerProduct');
    Route::post('/productStore', [StoreController::class, 'productStore'])->name('productStore');
    
});
