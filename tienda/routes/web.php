<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('/', function () {
    return view('home');
})->name('home')->middleware('permission');

Route::get('/home', [WebController::class, 'fakeHome'])->name('fake_home');
Route::post('/home', [WebController::class, 'homeToken'])->name('home.token');


require __DIR__.'/auth.php';
