<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function (Request $request) {
    $user = $request->user();

    return response()->json([
        'name' => $user->name,
        'email' => $user->email
    ]);
})->middleware('auth:sanctum');

Route::middleware('guest:sanctum')->group(function () {
    Route::get('/login', [AuthController::class, 'login']);

    Route::post('/authenticate', [AuthController::class, 'authenticate']);
});
