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

Route::get('/institucional/unidad-de-gobierno', function () {
    return Inertia::render('Institucional/unidadGobierno');
})->name('unidad-de-gobierno');

Route::get('/institucional/normas-legales', function () {
    return Inertia::render('Institucional/normasLegales');
})->name('normas-legales');
Route::get('/contacto', function () {
    return Inertia::render('Institucional/contactenos');
})->name('contacto');

Route::get('/sirea', function () {
    return Inertia::render('Auth/SireaLogin', [
        'redirectTo' => '/plataforma' // o '/dashboard'
    ]);
})->name('sirea.login');

