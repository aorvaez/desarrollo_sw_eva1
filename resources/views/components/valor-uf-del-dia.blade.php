<div class="tarjeta-uf">
    <div class="tarjeta-uf-titulo">Indicador economico UF</div>

    @if ($indicador['exito'])
        <div class="tarjeta-uf-valor">
            ${{ number_format($indicador['valor'], 2, ',', '.') }}
        </div>
        <div class="tarjeta-uf-detalle">
            Valor al {{ $indicador['fecha'] }} - Fuente: {{ $indicador['fuente'] }}
        </div>

        @if ($montoEnUf !== null)
            <div class="tarjeta-uf-conversion">
                Monto del proyecto equivalente a
                <strong>{{ number_format($montoEnUf, 2, ',', '.') }} UF</strong>
            </div>
        @endif
    @else
        <div class="tarjeta-uf-error">{{ $indicador['mensaje'] }}</div>
    @endif
</div>
