@extends('layouts.plantilla-principal')

@section('titulo', 'Crear proyecto')

@section('contenido')
    <x-valor-uf-del-dia />

    <div class="panel">
        <h2>Crear nuevo proyecto</h2>

        <form action="{{ route('proyectos.guardar') }}" method="POST">
            @csrf

            <div class="campo">
                <label for="nombre">Nombre del proyecto</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="campo">
                <label for="fechaInicio">Fecha de inicio</label>
                <input type="date" id="fechaInicio" name="fechaInicio" value="{{ old('fechaInicio') }}" required>
            </div>

            <div class="campo">
                <label for="estado">Estado</label>
                <select id="estado" name="estado" required>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado }}" @selected(old('estado') === $estado)>{{ $estado }}</option>
                    @endforeach
                </select>
            </div>

            <div class="campo">
                <label for="responsable">Responsable</label>
                <input type="text" id="responsable" name="responsable" value="{{ old('responsable') }}" required>
            </div>

            <div class="campo">
                <label for="monto">Monto en pesos</label>
                <input type="number" id="monto" name="monto" step="1" min="0" value="{{ old('monto') }}" required>
            </div>

            <div class="acciones">
                <button type="submit" class="boton boton-primario">Guardar proyecto</button>
                <a class="boton boton-secundario" href="{{ route('proyectos.listar') }}">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
