<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', fn () => Inertia::render('Home'));


Route::post('/contacto/enviar', [ContactController::class, 'send'])
    ->middleware('throttle:5,1')
    ->name('contacto.enviar');

Route::get('/institucional/quienes-somos', function () {
    return Inertia::render('Institucional/QuienesSomos');
})->name('quienes-somos');