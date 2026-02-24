<?php

use App\Http\Controllers\ArbitrajeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::get('/', fn() => Inertia::render('Home'));


Route::post('/login', [LoginController::class, 'login']);

Route::post('/calculadora-arbitraje/pdf', [ArbitrajeController::class, 'generarPdf'])
    ->name('calculadora.arbitraje.pdf');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/usuario-session-data', [UserController::class, 'mostrarDatoUsuario']);
    Route::get('/mostrar-role', [RoleController::class, 'obtener']);
    Route::post('/cambiar-role', [LoginController::class, 'cambiarRol']);
    Route::get('/obtener-menus-role', [UserController::class, 'obtenerMenusPorRole']);
});

Route::get('/{path}', function () {
    return view('app');
})->where('path', '.*');




require __DIR__ . "/entidades.php";
