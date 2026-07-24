<?php

namespace App\Services;

use App\Models\Proyecto;
use Illuminate\Support\Facades\Session;

/**
 * Servicio de negocio para la gestion de proyectos.
 * Encapsula el acceso a los datos estaticos del modelo.
 */
class ProyectoService
{
    private function cargar(): array
    {
        if (!Session::has(Proyecto::CLAVE_SESION)) {
            Session::put(Proyecto::CLAVE_SESION, Proyecto::datosIniciales());
        }

        return Session::get(Proyecto::CLAVE_SESION);
    }

    private function guardar(array $proyectos): void
    {
        Session::put(Proyecto::CLAVE_SESION, array_values($proyectos));
    }

    public function obtenerTodos(): array
    {
        return $this->cargar();
    }

    public function obtenerPorId(int $id): ?array
    {
        foreach ($this->cargar() as $proyecto) {
            if ((int) $proyecto['id'] === $id) {
                return $proyecto;
            }
        }

        return null;
    }

    public function crear(array $datos): array
    {
        $proyectos = $this->cargar();
        $ids = array_column($proyectos, 'id');
        $datos['id'] = empty($ids) ? 1 : max($ids) + 1;
        $proyectos[] = $datos;
        $this->guardar($proyectos);

        return $datos;
    }

    public function actualizar(int $id, array $datos): ?array
    {
        $proyectos = $this->cargar();

        foreach ($proyectos as $indice => $proyecto) {
            if ((int) $proyecto['id'] === $id) {
                $datos['id'] = $id;
                $proyectos[$indice] = $datos;
                $this->guardar($proyectos);

                return $datos;
            }
        }

        return null;
    }

    public function eliminar(int $id): bool
    {
        $proyectos = $this->cargar();

        foreach ($proyectos as $indice => $proyecto) {
            if ((int) $proyecto['id'] === $id) {
                unset($proyectos[$indice]);
                $this->guardar($proyectos);

                return true;
            }
        }

        return false;
    }

    public function restablecer(): void
    {
        $this->guardar(Proyecto::datosIniciales());
    }
}
