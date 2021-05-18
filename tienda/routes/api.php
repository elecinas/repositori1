<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PictureController;

/*
Route::middleware('auth:api')->get('/shop', function (Request $request) {
    return $request->user();
});
*/
Route::middleware('auth:api')->group(function () {
    Route::resource('shops', ShopController::class);
    Route::prefix('/shops/{shop}')->group(function () {
        Route::get('/pictures', [PictureController::class, 'index']);
        Route::post('/pictures', [PictureController::class, 'store']);
        Route::put('/pictures/{picture}', [PictureController::class, 'update']);
        Route::delete('/pictures/{picture}', [PictureController::class, 'destroy']);
        Route::delete('/pictures', [PictureController::class, 'destroyAllPictures']);
    });
});
