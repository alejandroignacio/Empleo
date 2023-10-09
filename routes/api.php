<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\EmpleoController;

Route::apiResource('empleos', EmpleoController::class);

Route::apiResource('users', UserController::class);

Route::get('/api/users', [UserController::class, 'getUsersAPI'])->name('api.get.users');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
