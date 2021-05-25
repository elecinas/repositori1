<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'update'])->name('update');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/game', function () {
    return view('juego');
})->name('juego');

Route::get('/player_list', function () {
    return view('jugadores');
})->name('jugadores');
