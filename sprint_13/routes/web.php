<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasController;


//Inicio
Route::get('/', [ReservasController::class, 'home'])->name('home');

//Muestra las reservas
Route::get('/reservas', [ReservasController::class, 'list'])
        //->middleware('auth')
        ->name('booking.list');

/* * grupo middleware permission* */

Route::group(['middleware' => ['permission:gestor_reservas']], function() {

//Crea una reserva nueva
    Route::get('/reservas/create', [ReservasController::class, 'create'])
            ->name('booking.create');
    Route::post('/reservas', [ReservasController::class, 'store'])
            ->name('booking.store');

//Edita una reserva
    Route::get('reservas/edit/{id}', [ReservasController::class, 'edit'])
            ->name('booking.edit');
    Route::put('reservas/edit/{id}', [ReservasController::class, 'update'])
            ->name('booking.update');

//Elimina una reserva
    Route::delete('reservas/{id}', [ReservasController::class, 'delete'])
            ->name('booking.delete');

});


/* * COSICAS DE BREEZE* */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
