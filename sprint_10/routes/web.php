<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', [ProductController::class, 'home'])->name('product.list');

/**User**/

Route::get('/login', [UserController::class, 'index'])->name('user.index');
Route::post('/login', [UserController::class, 'registro'])->name('user.registro');

Route::get('/logout', function () {
    return 'Logout usuari';
});


//Enseña lista del catalogo
Route::get('/catalog', [ProductController::class, 'index'])->name('product.index');

//Enseña un producto concreto del catalogo
Route::get('catalog/show/{id}', [ProductController::class, 'show'])->name('product.show');

//Crea un producto concreto en el catalogo
Route::get('catalog/create', [ProductController::class, 'create'])->name('product.create');

Route::post('catalog', [ProductController::class, 'store'])->name('product.store');

//Edita un producto del catalogo
Route::get('catalog/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');

Route::put('catalog/show/{id}', [ProductController::class, 'update'])->name('product.update');

//Elimina un producto del catalogo
Route::delete('catalog/{id}', [ProductController::class, 'delete'])->name('product.delete');


