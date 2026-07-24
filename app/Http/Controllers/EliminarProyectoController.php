<?php

namespace App\Http\Controllers;

use App\Services\ProyectoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controlador para eliminar un proyecto por id.
 */
class EliminarProyectoController extends Controller
{
    public function __construct(private ProyectoService $proyectoService)
    {
    }

    public function mostrarConfirmacion(int $id): View
    {
        $proyecto = $this->proyectoService->obtenerPorId($id);
        abort_if($proyecto === null, 404, 'Proyecto no encontrado.');

        return view('proyectos.eliminar-proyecto', ['proyecto' => $proyecto]);
    }

    public function destruir(int $id): RedirectResponse
    {
        $eliminado = $this->proyectoService->eliminar($id);
        abort_if(!$eliminado, 404, 'Proyecto no encontrado.');

        return redirect()
            ->route('proyectos.listar')
            ->with('mensajeExito', 'Proyecto eliminado correctamente.');
    }
}
