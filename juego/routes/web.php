<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/game', function () {
    return view('juego');
})->name('juego');

Route::get('/player_list', function () {
    return view('jugadores');
})->name('jugadores');
