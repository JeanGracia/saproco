<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // JG 25/3/2024
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GestionWeb\GestionController; // JG 25/3/2024
use App\Http\Controllers\Sigesca\PagoController; // JG 25/3/2024
use App\Http\Controllers\Sigesca\SigescaController; // JG 25/3/2024
use App\Http\Controllers\Sis\SisController;

// indica que al acceder a la raíz de la aplicación, se ejecutará el método __invoke del controlador HomeController.
Route::get('/', HomeController::class)->name('home'); // JG 25/3/2024

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * --------------------------------------------------------------------------
 * Módulo carga de pago sigesca JG 3/4/2024
 * --------------------------------------------------------------------------
 */
Route::get('/index', SigescaController::class)->name('sigesca.index');

Route::controller(PagoController::class)->prefix('sigesca/pago')->group(function () {
    Route::get('/buscar-solicitud', 'index')->name('buscar-solicitud.index');
    Route::get('/mostrar-solicitud', 'show')->name('mostrar-solicitud.show');
    Route::get('/{solicitud}/edit', 'edit')->name('pago.edit');
    Route::put('/{solicitud}', 'update')->name('cargarPago.update');
    Route::put('/tbl-solicitud/{solicitud}', 'Solicituds')->name('tbl.solicituds');
    Route::put('/tbl-product-solicitud/{solicitud}', 'ProductSolicitud')->name('tbl.productSolicitud');
});

/**
 * --------------------------------------------------------------------------
 * Implementación del módulo de reversos JG 25/3/2024
 * --------------------------------------------------------------------------
 */

// define un grupo de rutas que están agrupadas bajo el prefijo 'gestion' y que utilizan el middleware de autenticación. Además, estas rutas están asociadas al controlador GestionController.
Route::middleware('auth')->controller(GestionController::class)->prefix('gestion')->group(function () {
    Route::get('/buscar-factura', 'buscarFactura')->name('gestion.buscar-factura');
    Route::get('/mostrar-factura', 'index')->name('gestion.mostrar-factura');
});

/**
 * --------------------------------------------------------------------------
 * rutas encargadas de recibir los parámetros para reverzar a estatus 2.
 * --------------------------------------------------------------------------
 */
Route::controller(GestionController::class)->prefix('reverzar-estatus-2')->group(function () {
    Route::put('/details-factura/{id}', 'detailsFactura')->name('details-factura.update');
    Route::put('/detalle-solicitud/{idfactura}/update/{fechaenviart}', 'detalleSolicitud')->name('detalle-solicitud.update');
    Route::put('/asignaciones/{idfactura}', 'asignaciones')->name('asignacion.update');
    Route::put('/reg044-etiquetado/{ticket_id}', 'tickets')->name('reg044-etiquetado.update');
});

/**
 * --------------------------------------------------------------------------
 * rutas encargadas de recibir los parámetros para reverzar a estatus 3.
 * --------------------------------------------------------------------------
 */
Route::prefix('reverzar-estatus-3')->group(function () {
    Route::put('/details-factura/{id}}', [GestionController::class, 'factura'])->name('factura.update');
    Route::put('/detalle-solicitud/{idfactura}/update/{fechaenviart}', [GestionController::class, 'solicitud'])->name('solicitud.update');
    Route::put('/reg044-etiquetado/{ticket_id}', [GestionController::class, 'ticket'])->name('mckoi.update');
});

/**
 * --------------------------------------------------------------------------
 * rutas encargadas de eliminar registro segun servicio a reversar.
 * --------------------------------------------------------------------------
 */
Route::prefix('eliminar-registro')->group(function () {
    Route::delete('/eficiencia/{idfactura}', [GestionController::class, 'eficiencia'])->name('eficiencia.delete');
    Route::delete('/consulta-tecnica/{idfactura}', [GestionController::class, 'consultaTecnica'])->name('consulta-tecnica.delete');
    Route::delete('/niv/{idfactura}', [GestionController::class, 'niv'])->name('niv.delete');
    Route::delete('/certificado-inspeccion/{idfactura}', [GestionController::class, 'certInspeccion'])->name('certificado-inspeccion.delete');
});

/**
 * --------------------------------------------------------------------------
 * Implementación del módulo sis JG 6/5/2024
 * --------------------------------------------------------------------------
 */

Route::middleware('auth')->controller(SisController::class)->prefix('sis')->group(function () {
    Route::get('/buscar-rem', 'index')->name('sis.index');
    Route::get('/mostrar-rem', 'show')->name('sis.show');
    Route::delete('/borrar/{asignacion}/{idSolicitud}/{memocertificados}/{impresionCertificado}/{statusCertificado}/{certificado}', 'destroy')->name('sis.destroy');
});

require __DIR__ . '/auth.php';