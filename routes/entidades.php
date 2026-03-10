<?php

use App\Http\Controllers\CasillaElectronicaController;
use App\Http\Controllers\CasillaDashboardController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\NotificacionCasillaController;
use Illuminate\Http\Request;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TipoCasillaController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'tipo-casilla', 'middleware' => 'auth'], function () {
    Route::get('mostrar', [TipoCasillaController::class, 'show']);
    Route::get('todos', [TipoCasillaController::class, 'todos']);
    Route::get('listar', [TipoCasillaController::class, 'listar']);
    Route::post('guardar', [TipoCasillaController::class, 'store']);
    Route::post('actualizar', [TipoCasillaController::class, 'update']);
    Route::post('eliminar', [TipoCasillaController::class, 'destroy']);
});

Route::group(['prefix' => 'casilla', 'middleware' => 'auth'], function () {
    Route::get('mostrar', [CasillaElectronicaController::class, 'show']);
    Route::get('todos', [CasillaElectronicaController::class, 'todos']);
    Route::get('/', [CasillaElectronicaController::class, 'listar']); // Changed from 'listar'
    Route::post('/', [CasillaElectronicaController::class, 'store']); // Changed from 'guardar'
    Route::post('actualizar', [CasillaElectronicaController::class, 'update']);
    Route::post('eliminar', [CasillaElectronicaController::class, 'destroy']);
    Route::get('/dashboard', [\App\Http\Controllers\CasillaDashboardController::class, 'index']); // Changed from 'dashboard'

    // Expedientes y Notificaciones
    Route::get('/expedientes', [ExpedienteController::class, 'listar']);
    Route::post('/expedientes', [ExpedienteController::class, 'store']);
    Route::get('/expedientes/{id}', [ExpedienteController::class, 'show']);
    Route::post('/enviar-notificacion', [ExpedienteController::class, 'notificar']);

    Route::get('/notificaciones', [NotificacionCasillaController::class, 'listar']); // Added
    Route::get('/notificaciones/{id}', [NotificacionCasillaController::class, 'show']); // Added
    Route::post('/notificaciones/{id}/marcar-leida', [NotificacionCasillaController::class, 'marcarLeida']); // Added
});

Route::group(['prefix' => 'rol', 'middleware' => 'auth'], function () {
    Route::get('mostrar', [RoleController::class, 'show']);
    Route::get('todos', [RoleController::class, 'todos']);
    Route::get('listar', [RoleController::class, 'listar']);
    Route::post('guardar', [RoleController::class, 'store']);
    Route::post('actualizar', [RoleController::class, 'update']);
    Route::post('eliminar', [RoleController::class, 'destroy']);
});


Route::group(['prefix' => 'usuario', 'middleware' => 'auth'], function () {
    //Route::group(['prefix' => 'usuario'], function () {
    Route::post('reset-password', [UserController::class, 'resetclave']);
    Route::get('listar-habilitados', [UserController::class, 'habilitados']);
    Route::get('listar-inactivos', [UserController::class, 'inactivos']);
    Route::get('listar-todos', [UserController::class, 'todos']);
    Route::get('mostrar', [UserController::class, 'show']);
    Route::post('actualizar', [UserController::class, 'update']);
    Route::post('eliminar', [UserController::class, 'destroy']);
    Route::post('guardar', [UserController::class, 'store']);
    Route::get('cambiar-estado', [UserController::class, 'cambiarEstado']);
    Route::post('cambiar-clave', [UserController::class, 'cambiarclaveperfil']);
    Route::post('eliminar-role', [UserController::class, 'eliminarRole']);
    Route::post('eliminar-agencia', [UserController::class, 'eliminarAgencia']);
    Route::post('agregar-role', [UserController::class, 'agregarRole']);
    Route::post('agregar-agencia', [UserController::class, 'agregarAgencia']);
    Route::get('roles-disponibles', [UserController::class, 'rolesDisponibles']);
    Route::get('agencias-disponibles', [UserController::class, 'agenciasDisponibles']);
    Route::get('users-tipo-agencia', [UserController::class, 'obtenerPorTipo']);
    Route::post('cambiar-imagen', [UserController::class, 'cambiarImagen']);
    Route::get('obtener-usuarios-operaciones', [UserController::class, 'obtenerUsuariosOperadores']);
});
