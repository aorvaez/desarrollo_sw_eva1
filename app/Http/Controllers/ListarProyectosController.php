<?php

namespace App\Http\Controllers;

use App\Services\ProyectoService;
use Illuminate\View\View;

/**
 * Controlador para obtener los proyectos.
 */
class ListarProyectosController extends Controller
{
    public function __construct(private ProyectoService $proyectoService)
    {
    }

    public function __invoke(): View
    {
        $proyectos = $this->proyectoService->obtenerTodos();

        return view('proyectos.listar-proyectos', [
            'proyectos' => $proyectos,
            'totalProyectos' => count($proyectos),
        ]);
    }
}
