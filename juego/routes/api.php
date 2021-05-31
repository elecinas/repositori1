<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\TokenController;
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//rutas sin proteger por token
Route::post('/login', [TokenController::class, 'login'])->name('login');
Route::prefix('/players')->group(function () {
    Route::get('/', [PlayersController::class, 'index'])->name('players.index');
    Route::get('/ranking', [GamesController::class, 'ranking'])->name('games.ranking');
    Route::get('/ranking/loser', [GamesController::class, 'loser'])->name('games.loser');
    Route::get('/ranking/winner', [GamesController::class, 'winner'])->name('games.winner');
});

//rutas protegidas con token
Route::group(['middleware' => ['jwt.auth']], function(){
    Route::post('/refresh', [TokenController::class, 'refreshToken']);
    Route::get('/logout', [TokenController::class, 'logout']);

    Route::prefix('/players')->group(function () {
        Route::post('/', [PlayersController::class, 'create'])->name('players.create');
        Route::put('/{id}', [PlayersController::class, 'update'])->name('players.update');
        Route::get('/{id}/games', [GamesController::class, 'index'])->name('games.index');
        Route::post('/{id}/games', [GamesController::class, 'create'])->name('games.create');
        Route::delete('/{id}/games', [GamesController::class, 'destroy'])->name('games.destroy');
    });
});