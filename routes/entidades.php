<?php

use App\Http\Controllers\CasillaElectronicaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'casilla', 'middleware' => 'auth'], function () {
    Route::get('mostrar', [CasillaElectronicaController::class, 'show']);
    Route::get('todos', [CasillaElectronicaController::class, 'todos']);
    Route::get('listar', [CasillaElectronicaController::class, 'listar']);
    Route::post('guardar', [CasillaElectronicaController::class, 'store']);
    Route::post('actualizar', [CasillaElectronicaController::class, 'update']);
    Route::post('eliminar', [CasillaElectronicaController::class, 'destroy']);
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
