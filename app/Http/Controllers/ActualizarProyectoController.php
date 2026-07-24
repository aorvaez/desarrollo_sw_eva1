<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Services\ProyectoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Controlador para actualizar un proyecto por id.
 */
class ActualizarProyectoController extends Controller
{
    public function __construct(private ProyectoService $proyectoService)
    {
    }

    public function mostrarFormulario(int $id): View
    {
        $proyecto = $this->proyectoService->obtenerPorId($id);
        abort_if($proyecto === null, 404, 'Proyecto no encontrado.');

        return view('proyectos.editar-proyecto', [
            'proyecto' => $proyecto,
            'estados' => Proyecto::estadosDisponibles(),
        ]);
    }

    public function actualizar(Request $peticion, int $id): RedirectResponse
    {
        $datosValidados = $peticion->validate([
            'nombre' => 'required|string|max:100',
            'fechaInicio' => 'required|date',
            'estado' => 'required|string',
            'responsable' => 'required|string|max:100',
            'monto' => 'required|numeric|min:0',
        ]);

        $resultado = $this->proyectoService->actualizar($id, $datosValidados);
        abort_if($resultado === null, 404, 'Proyecto no encontrado.');

        return redirect()
            ->route('proyectos.listar')
            ->with('mensajeExito', 'Proyecto actualizado correctamente.');
    }
}
