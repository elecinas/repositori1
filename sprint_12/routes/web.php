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
Route::get('/calendario', [PartidosController::class, 'calendar_list'])
        ->middleware('auth')
        ->name('calendar.list');

//Muestra los Equipos
Route::get('/teams', [PartidosController::class, 'teams_list'])
        ->middleware('auth')
        ->name('teams.list');

/* * grupo middleware permission* */

Route::group(['middleware' => ['permission:editar_partidos']], function() {

//Crea un partido nuevo
    Route::get('/calendario/create', [PartidosController::class, 'create_calendar'])
            ->middleware('auth')
            ->name('calendar.create');
    Route::post('/calendario', [PartidosController::class, 'store_calendar'])
            ->middleware('auth')
            ->name('calendar.store');

//Edita un partido
    Route::get('calendario/edit/{id}', [PartidosController::class, 'edit_calendar'])
            ->middleware('auth')
            ->name('calendar.edit');
    Route::put('calendario/edit/{id}', [PartidosController::class, 'update_calendar'])
            ->middleware('auth')
            ->name('calendar.update');

//Elimina un partido
    Route::delete('calendario/{id}', [PartidosController::class, 'delete_calendar'])
            ->middleware('auth')
            ->name('calendar.delete');

//Crea un equipo nuevo
    Route::get('/teams/create', [PartidosController::class, 'create_team'])
            ->middleware('auth')
            ->name('team.create');
    Route::post('teams', [PartidosController::class, 'store_team'])
            ->middleware('auth')
            ->name('team.store');

//Edita un equipo
    Route::get('teams/edit/{id}', [PartidosController::class, 'edit_team'])
            ->middleware('auth')
            ->name('team.edit');
    Route::put('teams/edit/{id}', [PartidosController::class, 'update_team'])
            ->middleware('auth')
            ->name('team.update');

//Elimina un equipo
    Route::delete('teams/{id}', [PartidosController::class, 'delete_team'])
            ->middleware('auth')
            ->name('team.delete');
});


/* * COSICAS DE BREEZE* */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
