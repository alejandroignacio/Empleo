<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployerProfileController;
use App\Http\Controllers\ApplicantProfileController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\NotificationsController;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Autenticación
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas para el recurso "empleos"
Route::resource('empleos', EmpleoController::class);
Route::post('empleos/{empleo}/aplicar', [EmpleoController::class, 'aplicar'])->name('empleos.aplicar');

// Rutas para perfiles de empleadores y postulantes
Route::resource('employer-profile', EmployerProfileController::class);
Route::resource('applicant-profile', ApplicantProfileController::class);

// Rutas para gestionar perfil de usuario
Route::get('/profile/create', [UserController::class, 'createProfile'])->name('profile.create');
Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Empleos
// He eliminado las rutas que se solapaban con el resource
Route::post('/empleos/{jobId}/postular', [EmpleoController::class, 'applyForJob'])->name('jobs.apply');
Route::get('/empleos/{jobId}/postulantes', [EmpleoController::class, 'applicants'])->name('jobs.applicants');


// Usuario
Route::get('/usuario/{userId}', [UserController::class, 'userProfile'])->name('user.profile');

Route::get('/empleos/{jobId}', 'EmpleoController@jobDetails')->name('jobs.details');
Route::post('/empleos/{jobId}/postular', 'EmpleoController@applyForJob')->name('jobs.apply');
Route::get('/empleos-disponibles', 'EmpleoController@availableJobs')->name('jobs.available');
Route::get('/empleos-para-postulantes', 'UserController@viewJobsForApplicants')->name('jobs.for.applicants')->middleware('auth');
// Empleadores ven y gestionan sus empleos
Route::get('/empleador/empleos', 'EmpleoController@index')->name('empleador.empleos')->middleware('auth');
Route::get('/empleos/{jobId}', [EmpleoController::class, 'jobDetails'])->name('jobs.details')->middleware('auth');

// Postulantes ven y postulan a empleos
Route::get('/postulante/empleos', 'EmpleoController@viewJobsForApplicants')->name('postulante.empleos')->middleware('auth');

Route::get('/notification/read/{id}', 'NotificationsController@markAsRead')->name('notification.read');
Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications.index');

Route::get('/notifications/{id}/read', [NotificationsController::class, 'markAsRead'])->name('notifications.markAsRead');
