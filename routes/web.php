<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludoController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\DepartamentoController;


/**RUTAS**/

Route::get('/', function () {
    return view('home');
});

Route::get('saludo/{nombre?}', [SaludoController::class, 'saludar']);

Route::get('paises', [PaisController::class, 'index']);
Route::post('paises', [PaisController::class, 'store']);
Route::get('paises/{pais}', [PaisController::class, 'show']);
Route::put('paises/{pais}', [PaisController::class, 'update']);
Route::delete('paises/{pais}', [PaisController::class, 'destroy']);

Route::get('paises/{pais}/departamentos', [DepartamentoController::class, 'index']);
Route::post('paises/{pais}/departamentos', [DepartamentoController::class, 'store']);
Route::get('paises/{pais}/departamentos/{departamento}', [DepartamentoController::class, 'show']);
Route::put('paises/{pais}/departamentos/{departamento}', [DepartamentoController::class, 'update']);
Route::delete('paises/{pais}/departamentos/{departamento}', [DepartamentoController::class, 'destroy']);