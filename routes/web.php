<?php

use App\Http\Controllers\ArbitrajeController;
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

Route::get('/institucional/organo-direccion', function () {
    return Inertia::render('Institucional/OrganoDireccion');
})->name('organo-direccion');

Route::get('/institucional/NominaArbitros', function () {
    return Inertia::render('Institucional/NominaArbitros');
})->name('nomina-arbitros');
Route::get('/institucional/miembrosjprd', function () {
    return Inertia::render('Institucional/MiembrosJPRD');
})->name('miembros-jprd');

Route::get('/institucional/unidad-de-gobierno', function () {
    return Inertia::render('Institucional/unidadGobierno');
})->name('unidad-de-gobierno');

Route::get('/institucional/normas-legales', function () {
    return Inertia::render('Institucional/normasLegales');
})->name('normas-legales');

Route::get('/contacto', function () {
    return Inertia::render('Institucional/contactenos');
})->name('contacto');

Route::get('/calculadora', function () {
    return Inertia::render('Institucional/Calculadora');
})->name('calculadora');

Route::get('/calculadora-junta', function () {
    return Inertia::render('Institucional/CalculadoraJunta');
})->name('calculadora-junta');

Route::get('/arbitraje-en-contratacion-publica', function () {
    return Inertia::render('Servicios/ArbitrajeContratacionPublica');
});

Route::get('/arbitraje-de-emergencia', function () {
    return Inertia::render('Servicios/ArbitrajeDeEmergencia');
});

Route::get('/arbitraje-entre-privados', function () {
    return Inertia::render('Servicios/ArbitrajeEntrePrivados');
});

Route::get('/junta-prevencion-resolucion', function () {
    return Inertia::render('Servicios/JuntaPrevencionResolucion');
});

Route::get('/recusacion', function () {
    return Inertia::render('Servicios/Recusacion');
});

Route::get('/peritaje', function () {
    return Inertia::render('Servicios/Peritaje');
});

Route::get('/designacion-residual-arbitro', function () {
    return Inertia::render('Servicios/DesignacionResidual');
});

Route::get('/arbitro-unico-tribunal', function () {
    return Inertia::render('Servicios/ArbitroUnicoTribunal');
});

Route::get('/instalacion-arbitral', function () {
    return Inertia::render('Servicios/InstalacionArbitral');
});

Route::get('/institucional/banco-de-laudos', function () {
    return inertia('Institucional/BancoDeLaudos', [
      // 'laudos' => $laudos,
    ]);
})->name('banco.laudos');

Route::get('/institucional/banco-de-decisiones', function () {
    return inertia('Institucional/BancoDeDecisiones', [
      // 'laudos' => $laudos,
    ]);
})->name('banco.decisiones');
Route::get('/sirea', function () {
    return Inertia::render('Auth/SireaLogin', [
        'redirectTo' => '/plataforma' // o '/dashboard'
    ]);
})->name('sirea.login');


Route::post('/calculadora-arbitraje/pdf', [ArbitrajeController::class, 'generarPdf'])
    ->name('calculadora.arbitraje.pdf');
