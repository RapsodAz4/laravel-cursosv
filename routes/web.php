<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('proyectos', ProyectoController::class);

// Ruta adicional para generar PDF
Route::get('/proyectos/informe/pdf', [ProyectoController::class, 'generarPDF'])->name('proyectos.pdf');


