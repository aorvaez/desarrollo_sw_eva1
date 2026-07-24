@extends('layouts.plantilla-principal')

@section('titulo', 'Eliminar proyecto')

@section('contenido')
    <div class="panel">
        <h2>Eliminar proyecto #{{ $proyecto['id'] }}</h2>

        <p>Confirme la eliminacion del siguiente proyecto. Esta accion no se puede deshacer.</p>

        <dl class="lista-datos">
            <dt>Nombre</dt>
            <dd>{{ $proyecto['nombre'] }}</dd>

            <dt>Fecha de inicio</dt>
            <dd>{{ date('d-m-Y', strtotime($proyecto['fechaInicio'])) }}</dd>

            <dt>Estado</dt>
            <dd>{{ $proyecto['estado'] }}</dd>

            <dt>Responsable</dt>
            <dd>{{ $proyecto['responsable'] }}</dd>

            <dt>Monto</dt>
            <dd>${{ number_format($proyecto['monto'], 0, ',', '.') }}</dd>
        </dl>

        <form action="{{ route('proyectos.destruir', $proyecto['id']) }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="acciones">
                <button type="submit" class="boton boton-peligro">Confirmar eliminacion</button>
                <a class="boton boton-secundario" href="{{ route('proyectos.listar') }}">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
