<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard2');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
