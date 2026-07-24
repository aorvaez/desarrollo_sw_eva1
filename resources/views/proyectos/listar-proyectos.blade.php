@extends('layouts.plantilla-principal')

@section('titulo', 'Listado de proyectos')

@section('contenido')
    <x-valor-uf-del-dia />

    <div class="panel">
        <h2>Listado de proyectos ({{ $totalProyectos }})</h2>

        @if ($totalProyectos === 0)
            <p>No existen proyectos registrados.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Fecha de inicio</th>
                        <th>Estado</th>
                        <th>Responsable</th>
                        <th>Monto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyectos as $proyecto)
                        <tr>
                            <td>{{ $proyecto['id'] }}</td>
                            <td>{{ $proyecto['nombre'] }}</td>
                            <td>{{ date('d-m-Y', strtotime($proyecto['fechaInicio'])) }}</td>
                            <td>
                                <span class="etiqueta-estado estado-{{ strtolower(str_replace(' ', '', $proyecto['estado'])) === 'enprogreso' ? 'progreso' : strtolower($proyecto['estado']) }}">
                                    {{ $proyecto['estado'] }}
                                </span>
                            </td>
                            <td>{{ $proyecto['responsable'] }}</td>
                            <td>${{ number_format($proyecto['monto'], 0, ',', '.') }}</td>
                            <td>
                                <a class="boton boton-detalle" href="{{ route('proyectos.detalle', $proyecto['id']) }}">Ver</a>
                                <a class="boton boton-secundario" href="{{ route('proyectos.editar', $proyecto['id']) }}">Editar</a>
                                <a class="boton boton-peligro" href="{{ route('proyectos.eliminar', $proyecto['id']) }}">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="acciones">
            <a class="boton boton-primario" href="{{ route('proyectos.crear') }}">Agregar proyecto</a>
        </div>
    </div>
@endsection
