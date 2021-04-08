<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartidosController;

/*
Route::get('/', function () {
    return view('welcome');
});
 */

//Inicio
Route::get('/', [PartidosController::class, 'home'])->name('home');

//Muestra el Calendario de partidos
Route::get('/calendario', [PartidosController::class, 'calendar_list'])->name('calendar.list');
//Route::post('/calendario', [PartidosController::class, ''])->name('');

//Muestra la Clasificación
Route::get('/classification', [PartidosController::class, 'classification_list'])->name('classification.list');

//Muestra los Equipos
Route::get('/teams', [PartidosController::class, 'teams_list'])->name('teams.list');




/**COSICAS DE BREEZE**/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
