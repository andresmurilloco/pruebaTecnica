<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ApuestasController;
use App\Http\Controllers\EventosDeportivosController;

// Rutas para Usuarios
Route::prefix('usuarios')->group(function () {
    Route::post('/', [UserController::class, 'create']);
    Route::put('/{id}', [UserController::class, 'update']);
});

// Rutas para Apuestas
Route::prefix('apuestas')->group(function () {
    Route::post('/', [ApuestasController::class, 'create']);
    Route::put('/{id}', [ApuestasController::class, 'updateState']);
    Route::get('/usuario/{userId}', [ApuestasController::class, 'getByUser']);
    Route::get('/evento/{eventId}', [ApuestasController::class, 'getTotalByEvent']);
});

// Rutas para Eventos Deportivos
Route::prefix('eventos')->group(function () {
    Route::post('/', [EventosDeportivosController::class, 'create']);
    Route::get('/', [EventosDeportivosController::class, 'getAll']);
    Route::get('/{eventId}/total-apostado', [EventosDeportivosController::class, 'getTotalBetByEvent']);
});
