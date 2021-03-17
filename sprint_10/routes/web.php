<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view ('auth/login');
});

Route::get('/logout', function () {
    return 'Logout usuari';
});


//Enseña lista del catalogo
Route::get('/catalog', [ProductController::class, 'index']);

//Enseña un producto concreto del catalogo
Route::get('catalog/show/{id}', [ProductController::class, 'show']);

//Crea un producto concreto en el catalogo
Route::get('catalog/create', [ProductController::class, 'create']);

Route::post('catalog', [ProductController::class, 'store']);

//Edita un producto del catalogo
Route::get('catalog/edit/{id}', [ProductController::class, 'edit']);

Route::put('catalog/show/{id}', [ProductController::class, 'update']);