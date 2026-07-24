<?php

use App\Http\Controllers\ActualizarProyectoController;
use App\Http\Controllers\CrearProyectoController;
use App\Http\Controllers\DetalleProyectoController;
use App\Http\Controllers\EliminarProyectoController;
use App\Http\Controllers\ListarProyectosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de la aplicacion web - Gestion de Proyectos Tech Solutions
|--------------------------------------------------------------------------
| Cada ruta conecta una peticion HTTP con su controlador correspondiente.
*/

Route::redirect('/', '/proyectos');

Route::prefix('proyectos')->name('proyectos.')->group(function () {

    // Ruta 1: Listar todos los proyectos
    Route::get('/', ListarProyectosController::class)->name('listar');

    // Ruta 2: Agregar proyecto
    Route::get('/crear', [CrearProyectoController::class, 'mostrarFormulario'])->name('crear');
    Route::post('/crear', [CrearProyectoController::class, 'guardar'])->name('guardar');

    // Ruta 4: Actualizar proyecto por su id
    Route::get('/{id}/editar', [ActualizarProyectoController::class, 'mostrarFormulario'])->name('editar');
    Route::put('/{id}', [ActualizarProyectoController::class, 'actualizar'])->name('actualizar');

    // Ruta 3: Eliminar proyecto por su id
    Route::get('/{id}/eliminar', [EliminarProyectoController::class, 'mostrarConfirmacion'])->name('eliminar');
    Route::delete('/{id}', [EliminarProyectoController::class, 'destruir'])->name('destruir');

    // Ruta 5: Obtener un proyecto por su id
    Route::get('/{id}', DetalleProyectoController::class)->name('detalle')->where('id', '[0-9]+');
});
