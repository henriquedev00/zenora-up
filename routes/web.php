<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::middleware('guest:sanctum')->group(function () {
    Route::get('/login', [AuthController::class, 'login']);

    Route::post('/authenticate', [AuthController::class, 'authenticate']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/', [HomeController::class, 'index']);
});
