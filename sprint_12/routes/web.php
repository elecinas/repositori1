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

//Muestra la Clasificación
Route::get('/classification', [PartidosController::class, 'classification_list'])->name('classification.list');

//Muestra los Equipos
Route::get('/teams', [PartidosController::class, 'teams_list'])->name('teams.list');

//Crea un equipo nuevo
Route::get('/teams/create', [PartidosController::class, 'create_team'])->name('team.create');
Route::post('teams', [PartidosController::class, 'store_team'])->name('team.store');

//Edita un equipo
Route::get('teams/edit/{id}', [PartidosController::class, 'edit_team'])->name('team.edit');
Route::put('teams/edit/{id}', [PartidosController::class, 'update_team'])->name('team.update');

//Elimina un equipo
Route::delete('teams/{id}', [PartidosController::class, 'delete_team'])->name('team.delete');


/**COSICAS DE BREEZE**/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
