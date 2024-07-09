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
    Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('galleryEdit');
    Route::post('/gallery/update/{id}', [GalleryController::class, 'update'])->name('galleryUpdate');
    Route::delete('/gallery/delete/{id}', [GalleryController::class, 'destroy'])->name('galleryDelete');
    Route::post('/gallery/toggle-status/{id}', [GalleryController::class, 'toggleStatus'])->name('galleryToggleStatus');
    Route::get('/toggle-image-status/{id}', [GalleryController::class, 'toggleImageStatus'])->name('toggleImageStatus');
    Route::get('/edit-image/{id}', [GalleryController::class, 'editImage'])->name('editImage');
    Route::put('/update-image/{id}', [GalleryController::class, 'updateImage'])->name('updateImage'); // Añade esta línea
    Route::delete('/destroy-image/{id}', [GalleryController::class, 'destroyImage'])->name('destroyImage');

    //rutas de usuarios
    Route::get('/users', [UserController::class, 'index'])->name('usersIndex');
    Route::post('/users/make-artist/{id}', [UserController::class, 'makeArtist'])->name('usersMakeArtist');
    Route::post('/users/make-user/{id}', [UserController::class, 'makeUser'])->name('usersMakeUser');

   // Rutas tienda
    Route::get('/storeNav', [StoreController::class, 'storeNav'])->name('storeNav');
    Route::get('/store', [StoreController::class, 'store'])->name('store');
    Route::get('/registerProduct', [StoreController::class, 'registerProduct'])->name('registerProduct');
    Route::post('/productStore', [StoreController::class, 'productStore'])->name('productStore');
    Route::get('/product/edit/{id}', [StoreController::class, 'editProduct'])->name('products.edit');
    Route::put('/product/update/{id}', [StoreController::class, 'updateProduct'])->name('products.update');
    Route::delete('/product/delete/{id}', [StoreController::class, 'destroyProduct'])->name('products.destroy');
    Route::post('/product/toggle-status/{id}', [StoreController::class, 'toggleProductStatus'])->name('products.toggleStatus');
    Route::get('/orders', [StoreController::class, 'showOrders'])->name('orders');
    Route::get('/bill/{id}', [StoreController::class, 'showBill'])->name('bill.show');


    
});
