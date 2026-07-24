<?php

namespace App\Http\Controllers;

use App\Services\IndicadorEconomicoService;
use App\Services\ProyectoService;
use Illuminate\View\View;

/**
 * Controlador para obtener un proyecto por id.
 */
class DetalleProyectoController extends Controller
{
    public function __construct(
        private ProyectoService $proyectoService,
        private IndicadorEconomicoService $indicadorService
    ) {
    }

    public function __invoke(int $id): View
    {
        $proyecto = $this->proyectoService->obtenerPorId($id);
        abort_if($proyecto === null, 404, 'Proyecto no encontrado.');

        return view('proyectos.detalle-proyecto', [
            'proyecto' => $proyecto,
            'montoEnUf' => $this->indicadorService->convertirPesosAUf((float) $proyecto['monto']),
        ]);
    }
}
