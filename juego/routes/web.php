<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
//Funciona! pero hay que hacerlo desde el componente Vue D:
//Route::get('/login', [AuthController::class, 'create'])->name('login');
//Route::post('/login', [AuthController::class, 'login']);
//Route::get('/register', [AuthController::class, 'register'])->name('register');
//Route::post('/register', [AuthController::class, 'update'])->name('update');
//Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('home');
})->name('home');