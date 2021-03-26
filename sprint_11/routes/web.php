<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;

Route::get('/', [EmployeeController::class, 'home'])->name('home');

Route::get('/login', [UserController::class, 'index'])->name('user.index');
Route::post('/login', [UserController::class, 'registro'])->name('user.registro');


/**GESTION DE EMPLEADOS**/

//Enseña lista de empleados
Route::get('/employees', [EmployeeController::class, 'list'])->name('employee.index');

//Enseña los empleados de un puesto
Route::post('/employees/inposition', [EmployeeController::class, 'empleadosPuesto'])->name('employee.inposition');

//Añade un empleado a la BD
Route::get('employees/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('employees', [EmployeeController::class, 'store'])->name('employee.store');

//Edita un producto del catalogo
Route::get('employees/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('employees/edit/{id}', [EmployeeController::class, 'update'])->name('employee.update');

//Elimina un producto del catalogo
Route::delete('employees/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');


