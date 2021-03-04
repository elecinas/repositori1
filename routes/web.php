<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//probando stir

Route::get('/test', function () {
    echo "esto es una prueba!!";
});

Route::get('/probando/ruta', function () {
    return 'get';
});

Route::post('/probando/ruta', function () {
    return 'post';
});

Route::put('/probando/ruta', function () {
    return 'put';
});

Route::delete('/probando/ruta', function () {
    return 'delete';
});

Route::match(['get', 'post','put'], '/testing', function () {
    echo 'Ruta testing para los verbos GET, POST y PUT';
});

Route::any('/cualquiercosa', function () {
    echo 'La ruta /cualquiercosa asociada a cualquier verbo';
});

Route::get('colaboradores/{nombre}', function ($nombre) {
    return "Mostrando al colaborador $nombre";
});

//Route::get('tienda/productos/{id}', function ($id_producto) {
 //   return "Mostrando el producto $id_producto de la tienda";
//});

Route::get('agenda/{mes}/{ano}', function ($mes, $ano) {
    return "Viendo la agenda de $mes de $ano";
});

use App\Http\Controllers\TiendaController;

Route::get('tienda/productos/{id}', 'App\Http\Controllers\TiendaController@producto');