<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    $user = $request->user();

    return response()->json([
        'name' => $user->full_name,
        'email' => $user->email
    ]);
})->middleware('auth:sanctum');
