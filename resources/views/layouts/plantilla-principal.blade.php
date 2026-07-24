<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Gestion de Proyectos') - Tech Solutions</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, Helvetica, sans-serif; background: #f4f6f9; color: #22303f; }
        .barra-superior { background: #1b2a41; color: #fff; padding: 18px 32px; display: flex; justify-content: space-between; align-items: center; }
        .barra-superior h1 { font-size: 20px; }
        .barra-superior nav a { color: #d9c188; text-decoration: none; margin-left: 20px; font-size: 14px; }
        .barra-superior nav a:hover { text-decoration: underline; }
        .contenedor { max-width: 1000px; margin: 28px auto; padding: 0 20px; }
        .panel { background: #fff; border: 1px solid #dde3ea; border-radius: 6px; padding: 24px; margin-bottom: 22px; }
        .panel h2 { font-size: 18px; margin-bottom: 16px; color: #1b2a41; border-bottom: 2px solid #d9c188; padding-bottom: 8px; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th { background: #1b2a41; color: #fff; text-align: left; padding: 10px; }
        td { padding: 10px; border-bottom: 1px solid #e6eaef; }
        tr:nth-child(even) td { background: #fafbfc; }
        .boton { display: inline-block; padding: 8px 14px; border-radius: 4px; text-decoration: none; font-size: 13px; border: none; cursor: pointer; font-family: inherit; }
        .boton-primario { background: #1b2a41; color: #fff; }
        .boton-secundario { background: #6c7a89; color: #fff; }
        .boton-peligro { background: #b03a3a; color: #fff; }
        .boton-detalle { background: #d9c188; color: #1b2a41; }
        .campo { margin-bottom: 16px; }
        .campo label { display: block; font-size: 13px; font-weight: bold; margin-bottom: 6px; }
        .campo input, .campo select { width: 100%; padding: 9px; border: 1px solid #c9d2dc; border-radius: 4px; font-size: 14px; font-family: inherit; }
        .alerta-exito { background: #e4f2e4; border-left: 4px solid #3d7a3d; padding: 12px; margin-bottom: 18px; font-size: 14px; }
        .alerta-error { background: #fbe6e6; border-left: 4px solid #b03a3a; padding: 12px; margin-bottom: 18px; font-size: 14px; }
        .alerta-error ul { margin-left: 18px; }
        .etiqueta-estado { padding: 3px 9px; border-radius: 10px; font-size: 12px; }
        .estado-planificado { background: #dfe7f1; color: #2c4a72; }
        .estado-progreso { background: #fdf0d5; color: #8a6412; }
        .estado-finalizado { background: #e0f0e3; color: #2f6b3a; }
        .estado-cancelado { background: #f4dcdc; color: #8c2f2f; }
        .tarjeta-uf { background: #1b2a41; color: #fff; border-radius: 6px; padding: 18px; margin-bottom: 22px; border-left: 5px solid #d9c188; }
        .tarjeta-uf-titulo { font-size: 12px; letter-spacing: 1px; text-transform: uppercase; color: #d9c188; }
        .tarjeta-uf-valor { font-size: 30px; font-weight: bold; margin: 6px 0; }
        .tarjeta-uf-detalle { font-size: 12px; color: #b9c4d2; }
        .tarjeta-uf-conversion { margin-top: 10px; padding-top: 10px; border-top: 1px solid #33455e; font-size: 14px; }
        .tarjeta-uf-error { font-size: 14px; color: #f0b7b7; }
        .lista-datos dt { font-size: 12px; color: #6c7a89; text-transform: uppercase; margin-top: 12px; }
        .lista-datos dd { font-size: 16px; margin-top: 3px; }
        .acciones { margin-top: 20px; display: flex; gap: 10px; }
        .pie { text-align: center; font-size: 12px; color: #7d8894; padding: 18px; }
    </style>
</head>
<body>
    <header class="barra-superior">
        <h1>Tech Solutions - Gestion de Proyectos</h1>
        <nav>
            <a href="{{ route('proyectos.listar') }}">Listado</a>
            <a href="{{ route('proyectos.crear') }}">Nuevo proyecto</a>
        </nav>
    </header>

    <main class="contenedor">
        @if (session('mensajeExito'))
            <div class="alerta-exito">{{ session('mensajeExito') }}</div>
        @endif

        @if ($errors->any())
            <div class="alerta-error">
                <strong>Revise los siguientes datos:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('contenido')
    </main>

    <footer class="pie">
        Desarrollo de Software Web I - IF204IINF | Instituto Profesional San Sebastian
    </footer>
</body>
</html>
