<?php

namespace App\Models;

/**
 * Modelo Proyecto - Tech Solutions
 * Trabaja con datos estaticos persistidos en sesion.
 */
class Proyecto
{
    public const CLAVE_SESION = 'proyectos_tech_solutions';

    public int $id;
    public string $nombre;
    public string $fechaInicio;
    public string $estado;
    public string $responsable;
    public float $monto;

    public function __construct(int $id, string $nombre, string $fechaInicio, string $estado, string $responsable, float $monto)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->fechaInicio = $fechaInicio;
        $this->estado = $estado;
        $this->responsable = $responsable;
        $this->monto = $monto;
    }

    /**
     * Datos estaticos iniciales del modelo.
     */
    public static function datosIniciales(): array
    {
        return [
            ['id' => 1, 'nombre' => 'Portal Corporativo', 'fechaInicio' => '2026-03-10', 'estado' => 'En progreso', 'responsable' => 'Claudio Ramirez', 'monto' => 15000000],
            ['id' => 2, 'nombre' => 'Migracion a la Nube', 'fechaInicio' => '2026-04-01', 'estado' => 'Planificado', 'responsable' => 'Andres Orellana', 'monto' => 28500000],
            ['id' => 3, 'nombre' => 'App Movil de Ventas', 'fechaInicio' => '2026-01-20', 'estado' => 'Finalizado', 'responsable' => 'Maria Contreras', 'monto' => 9800000],
            ['id' => 4, 'nombre' => 'Rediseno Intranet', 'fechaInicio' => '2026-05-15', 'estado' => 'En progreso', 'responsable' => 'Pedro Salinas', 'monto' => 12300000],
        ];
    }

    public static function estadosDisponibles(): array
    {
        return ['Planificado', 'En progreso', 'Finalizado', 'Cancelado'];
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'fechaInicio' => $this->fechaInicio,
            'estado' => $this->estado,
            'responsable' => $this->responsable,
            'monto' => $this->monto,
        ];
    }
}
