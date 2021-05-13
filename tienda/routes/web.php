<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('/', function () {
    return view('home');
})->name('home')->middleware('permission');

Route::get('/home', [WebController::class, 'fakeHome'])->name('fake_home');

/*Route::get('/home2', function () {
    return view('fake_home');
})->name('fake_home');*/
/*
Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth'])->name('dashboard');
*/
require __DIR__.'/auth.php';
