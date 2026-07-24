<?php

namespace App\View\Components;

use App\Services\IndicadorEconomicoService;
use Illuminate\View\Component;

/**
 * Componente reutilizable que muestra el valor de la UF del dia
 * consumiendo el servicio externo mindicador.cl.
 */
class ValorUfDelDia extends Component
{
    public array $indicador;
    public ?float $montoEnUf;

    public function __construct(
        private IndicadorEconomicoService $servicioIndicador,
        public ?float $monto = null
    ) {
        $this->indicador = $this->servicioIndicador->obtenerUfDelDia();
        $this->montoEnUf = $monto !== null
            ? $this->servicioIndicador->convertirPesosAUf($monto)
            : null;
    }

    public function render()
    {
        return view('components.valor-uf-del-dia');
    }
}
