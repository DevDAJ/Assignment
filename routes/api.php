<?php

use App\Http\Controllers\CarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/cars', [CarController::class, 'index']);

Route::get('/quote', [CarController::class, 'quote']);

Route::post('/cars', [CarController::class, 'create']);

Route::delete('/cars/{car}', [CarController::class, 'destroy']);