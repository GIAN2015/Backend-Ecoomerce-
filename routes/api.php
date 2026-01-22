<?php

use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});

use App\Http\Controllers\CustomerController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('clientes', CustomerController::class);
});


use App\Http\Controllers\ProductController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('productos', [ProductController::class, 'index']);
    Route::get('productos/{id}', [ProductController::class, 'show']);
    Route::post('productos', [ProductController::class, 'store']);          // propios
    Route::put('productos/{id}', [ProductController::class, 'update']);
    Route::delete('productos/{id}', [ProductController::class, 'destroy']);

    Route::post('productos/{id}/imagenes', [ProductController::class, 'uploadImage']);
});


use App\Http\Controllers\CatalogController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('catalogos/marcas', [CatalogController::class, 'brands']);
    Route::get('catalogos/categorias', [CatalogController::class, 'categories']);
    Route::get('catalogos/subcategorias/{categoria}', [CatalogController::class, 'subcategories']);
    Route::get('catalogos/unidades', [CatalogController::class, 'units']);
});


use App\Http\Controllers\OrderController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('ordenes', [OrderController::class, 'index']);
    Route::post('ordenes', [OrderController::class, 'store']);
    Route::get('ordenes/{id}', [OrderController::class, 'show']);
});


use App\Http\Controllers\DeltronSyncController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('deltron/sync/productos', [DeltronSyncController::class, 'syncProductos']);
    Route::post('deltron/sync/precios', [DeltronSyncController::class, 'syncPrecios']);
    Route::post('deltron/sync/stock', [DeltronSyncController::class, 'syncStock']);
});
