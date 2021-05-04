<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home') ->middleware('permission');

Route::get('/home2', function () {
    return view('fake_home');
})->name('fake_home');

Route::get('/dashboard', function () {
    return view('dashboard2');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
