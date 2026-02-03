<?php

use App\Http\Controllers\ArbitrajeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn() => Inertia::render('Home'));

// Route::post('/contacto/enviar', [ContactController::class, 'send'])
//     ->middleware('throttle:5,1')
//     ->name('contacto.enviar');
// Route::get('/sirea', function () {
//     return Inertia::render('Auth/SireaLogin', [
//         'redirectTo' => '/plataforma' // o '/dashboard'
//     ]);
// })->name('sirea.login');

Route::post('/calculadora-arbitraje/pdf', [ArbitrajeController::class, 'generarPdf'])
    ->name('calculadora.arbitraje.pdf');


Route::get('/{path}', function () {
    return view('app');
})->where('path', '.*');
