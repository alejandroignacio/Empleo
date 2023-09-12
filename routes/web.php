<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleoController;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas para el recurso "empleos"
Route::resource('empleos', EmpleoController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
