<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Services\ProyectoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Controlador para crear un proyecto.
 */
class CrearProyectoController extends Controller
{
    public function __construct(private ProyectoService $proyectoService)
    {
    }

    public function mostrarFormulario(): View
    {
        return view('proyectos.crear-proyecto', [
            'estados' => Proyecto::estadosDisponibles(),
        ]);
    }

    public function guardar(Request $peticion): RedirectResponse
    {
        $datosValidados = $peticion->validate([
            'nombre' => 'required|string|max:100',
            'fechaInicio' => 'required|date',
            'estado' => 'required|string',
            'responsable' => 'required|string|max:100',
            'monto' => 'required|numeric|min:0',
        ]);

        $this->proyectoService->crear($datosValidados);

        return redirect()
            ->route('proyectos.listar')
            ->with('mensajeExito', 'Proyecto creado correctamente.');
    }
}
