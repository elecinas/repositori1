<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PassportController;
/*
Route::get('/', function () {
    return view('home');
})->name('home')->middleware('permission');
*/
Route::get('/', [WebController::class, 'recibeRequest'])->name('home')->middleware('permission');

Route::get('/home', [WebController::class, 'fakeHome'])->name('fake_home');
Route::post('/home', [WebController::class, 'homeToken'])->name('home.token');


require __DIR__.'/auth.php';

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [PassportController::class, 'login']);
Route::post('/logout', [PassportController::class, 'logout'])->name('logout');
