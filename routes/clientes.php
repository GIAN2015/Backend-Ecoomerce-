<?php
use App\Http\Controllers\CustomerController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('clientes', CustomerController::class);
});
