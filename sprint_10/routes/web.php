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

Route::get('/test', ['middleware' => 'domingo', function () {
    return 'Probando ruta con middleware';
}]);

Route::group(['middleware' => 'domingo'], function(){
    Route::get('/probando/ruta', function(){
        //codigo a ejecutar en esta ruta y verbo GET
        return 'get';
    });
    Route::post('/probando/ruta', function(){
        //codigo a ejecutar en esta ruta y verbo POST
        return 'post';
    });
});

Route::get('respuesta', function(){
    return response('<br>Hola, respuesta', 200);
});

Route::get('respuesta2', function(){
    return response('<br>Esto es un error', 404);
});

Route::get('respuesta3', function(){
    return response("<br>1,2,3,4\n5,6,7,8", 200)
            ->header('Conten-Type', 'text-csv');
});

Route::get('respuesta4', function(){
    return response("", 301)
            ->header('location', 'https://www.google.com');
});

Route::get('respuesta5', function(){
    return response("En 5 segundos vamos hacia...", 200)
            ->header('Cache-Control', 'max-age=3600')
            ->header('Refresh', '5; url=https://www.google.com');
});