<?php

use App\Http\Controllers\ProductController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('productos', [ProductController::class, 'index']);
    Route::get('productos/{id}', [ProductController::class, 'show']);
    Route::post('productos', [ProductController::class, 'store']);          // propios
    Route::put('productos/{id}', [ProductController::class, 'update']);
    Route::delete('productos/{id}', [ProductController::class, 'destroy']);

    Route::post('productos/{id}/imagenes', [ProductController::class, 'uploadImage']);
});
