<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Costos de Arbitraje</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h1, h2, h3 { margin: 0 0 10px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 6px 8px; text-align: right; }
        th:first-child, td:first-child { text-align: left; }
        .header { margin-bottom: 20px; }
        .totales { background: #fce4ec; font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Calculadora de Costos de Arbitraje</h1>
        <p><strong>Fecha:</strong> {{ $fecha }}</p>
        <p>
            <strong>Moneda:</strong> {{ $moneda === 'PEN' ? 'Soles (PEN)' : 'Dólares (USD)' }}<br>
            <strong>Monto base de la controversia:</strong>
            S/ {{ number_format($monto_base, 2, ',', '.') }} (ya convertido a soles)
        </p>
        <p>
            <strong>Tipo de Arbitraje:</strong>
            {{ $tipo_arbitraje === 'unico' ? 'Árbitro Único' : 'Tribunal Arbitral' }}<br>
            <strong>Categoría:</strong>
            {{ $categoria === 'nacional' ? 'Nacional' : 'Internacional' }}
        </p>
    </div>

    <h3>Detalle de Costos</h3>
    <table>
        <thead>
            <tr>
                <th>Concepto</th>
                <th>Monto (S/)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tasa de presentación</td>
                <td>{{ number_format($tasa_presentacion, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Costos administrativos</td>
                <td>{{ number_format($costos_admin, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Honorarios arbitrales</td>
                <td>{{ number_format($honorarios, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td><strong>Subtotal</strong></td>
                <td><strong>{{ number_format($subtotal, 2, ',', '.') }}</strong></td>
            </tr>
            <tr>
                <td>IGV (18%)</td>
                <td>{{ number_format($igv, 2, ',', '.') }}</td>
            </tr>
            <tr class="totales">
                <td>Total a pagar (incluido IGV)</td>
                <td>{{ number_format($total, 2, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
