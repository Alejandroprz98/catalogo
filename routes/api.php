<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/movies', [MovieController::class, 'index']);      // Todas las películas
Route::get('/movies/{id}', [MovieController::class, 'show']);  // Película por ID
Route::post('/movies', [MovieController::class, 'store']);     // Insertar nueva película
Route::put('/movies/{id}', [MovieController::class, 'update']); // Actualizar película
Route::delete('/movies/{id}', [MovieController::class, 'destroy']); // Eliminar película