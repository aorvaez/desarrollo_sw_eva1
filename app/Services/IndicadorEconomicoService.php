<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Servicio externo de indicadores economicos.
 * Consume la API publica mindicador.cl para obtener el valor de la UF del dia.
 */
class IndicadorEconomicoService
{
    private const URL_API_UF = 'https://mindicador.cl/api/uf';
    private const MINUTOS_CACHE = 60;

    public function obtenerUfDelDia(): array
    {
        return Cache::remember('valor_uf_del_dia', now()->addMinutes(self::MINUTOS_CACHE), function () {
            return $this->consultarApiExterna();
        });
    }

    private function consultarApiExterna(): array
    {
        try {
            $respuesta = Http::timeout(10)->get(self::URL_API_UF);

            if (!$respuesta->successful()) {
                return $this->respuestaError('El servicio externo no respondio correctamente.');
            }

            $datos = $respuesta->json();
            $ultimoRegistro = $datos['serie'][0] ?? null;

            if ($ultimoRegistro === null) {
                return $this->respuestaError('El servicio externo no entrego datos de la serie.');
            }

            return [
                'exito' => true,
                'valor' => (float) $ultimoRegistro['valor'],
                'fecha' => date('d-m-Y', strtotime($ultimoRegistro['fecha'])),
                'unidad' => $datos['unidad_medida'] ?? 'Pesos',
                'fuente' => 'mindicador.cl',
                'mensaje' => null,
            ];
        } catch (\Throwable $excepcion) {
            Log::error('Error al consumir el servicio de la UF: ' . $excepcion->getMessage());

            return $this->respuestaError('No fue posible conectar con el servicio externo.');
        }
    }

    private function respuestaError(string $mensaje): array
    {
        return [
            'exito' => false,
            'valor' => null,
            'fecha' => date('d-m-Y'),
            'unidad' => 'Pesos',
            'fuente' => 'mindicador.cl',
            'mensaje' => $mensaje,
        ];
    }

    public function convertirPesosAUf(float $montoEnPesos): ?float
    {
        $uf = $this->obtenerUfDelDia();

        if (!$uf['exito'] || empty($uf['valor'])) {
            return null;
        }

        return round($montoEnPesos / $uf['valor'], 2);
    }
}
