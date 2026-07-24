@extends('layouts.plantilla-principal')

@section('titulo', 'Detalle del proyecto')

@section('contenido')
    <x-valor-uf-del-dia :monto="(float) $proyecto['monto']" />

    <div class="panel">
        <h2>Detalle del proyecto #{{ $proyecto['id'] }}</h2>

        <dl class="lista-datos">
            <dt>Nombre</dt>
            <dd>{{ $proyecto['nombre'] }}</dd>

            <dt>Fecha de inicio</dt>
            <dd>{{ date('d-m-Y', strtotime($proyecto['fechaInicio'])) }}</dd>

            <dt>Estado</dt>
            <dd>{{ $proyecto['estado'] }}</dd>

            <dt>Responsable</dt>
            <dd>{{ $proyecto['responsable'] }}</dd>

            <dt>Monto en pesos</dt>
            <dd>${{ number_format($proyecto['monto'], 0, ',', '.') }}</dd>

            <dt>Equivalencia en UF</dt>
            <dd>
                @if ($montoEnUf !== null)
                    {{ number_format($montoEnUf, 2, ',', '.') }} UF
                @else
                    No disponible
                @endif
            </dd>
        </dl>

        <div class="acciones">
            <a class="boton boton-secundario" href="{{ route('proyectos.editar', $proyecto['id']) }}">Editar</a>
            <a class="boton boton-peligro" href="{{ route('proyectos.eliminar', $proyecto['id']) }}">Eliminar</a>
            <a class="boton boton-primario" href="{{ route('proyectos.listar') }}">Volver al listado</a>
        </div>
    </div>
@endsection
