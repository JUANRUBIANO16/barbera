<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura - Comprobante #{{ $comprobante->id_comprobante }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #007bff;
            margin: 0;
            font-size: 28px;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        .invoice-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .invoice-details, .client-info {
            width: 45%;
        }
        .invoice-details h3, .client-info h3 {
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
        .info-row {
            display: flex;
            margin-bottom: 8px;
        }
        .info-label {
            font-weight: bold;
            width: 120px;
        }
        .info-value {
            flex: 1;
        }
        .services-table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px 0;
        }
        .services-table th,
        .services-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .services-table th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        .services-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .total-section {
            margin-top: 30px;
            text-align: right;
        }
        .total-row {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }
        .total-label {
            font-weight: bold;
            width: 150px;
            text-align: right;
            margin-right: 20px;
        }
        .total-value {
            width: 100px;
            text-align: right;
        }
        .grand-total {
            border-top: 2px solid #007bff;
            padding-top: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            border-top: 1px solid #ddd;
            padding-top: 20px;
            color: #666;
        }
        .payment-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>RAGNAROK BARBER SHOP</h1>
        <p>Factura de Venta</p>
        <p>Comprobante #{{ $comprobante->id_comprobante }}</p>
    </div>

    <div class="invoice-info">
        <div class="invoice-details">
            <h3>Información de la Factura</h3>
            <div class="info-row">
                <span class="info-label">Número:</span>
                <span class="info-value">{{ $comprobante->id_comprobante }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Fecha:</span>
                <span class="info-value">{{ $comprobante->fecha ? \Carbon\Carbon::parse($comprobante->fecha)->format('d/m/Y') : 'N/A' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Hora:</span>
                <span class="info-value">{{ $comprobante->hora ? \Carbon\Carbon::parse($comprobante->hora)->format('H:i') : 'N/A' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Método de Pago:</span>
                <span class="info-value">{{ $comprobante->tipoDePago->metodo ?? 'N/A' }}</span>
            </div>
        </div>

        <div class="client-info">
            <h3>Información del Cliente</h3>
            <div class="info-row">
                <span class="info-label">Nombre:</span>
                <span class="info-value">{{ $comprobante->venta->cliente->nombre ?? 'N/A' }} {{ $comprobante->venta->cliente->apellido ?? '' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Teléfono:</span>
                <span class="info-value">{{ $comprobante->venta->cliente->telefono ?? 'N/A' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Email:</span>
                <span class="info-value">{{ $comprobante->venta->cliente->correo ?? 'N/A' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Dirección:</span>
                <span class="info-value">{{ $comprobante->venta->cliente->direccion ?? 'N/A' }}</span>
            </div>
        </div>
    </div>

    <table class="services-table">
        <thead>
            <tr>
                <th>Descripción del Servicio</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $comprobante->venta->servicio->nombre ?? 'N/A' }}</td>
                <td>{{ $comprobante->venta->cantidad ?? 1 }}</td>
                <td>${{ number_format($comprobante->venta->valor ?? 0, 0, ',', '.') }}</td>
                <td>${{ number_format($comprobante->venta->total ?? 0, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="total-section">
        <div class="total-row">
            <span class="total-label">Subtotal:</span>
            <span class="total-value">${{ number_format($comprobante->venta->valor ?? 0, 0, ',', '.') }}</span>
        </div>
        <div class="total-row">
            <span class="total-label">Cantidad:</span>
            <span class="total-value">{{ $comprobante->venta->cantidad ?? 1 }}</span>
        </div>
        <div class="total-row grand-total">
            <span class="total-label">TOTAL:</span>
            <span class="total-value">${{ number_format($comprobante->venta->total ?? 0, 0, ',', '.') }}</span>
        </div>
    </div>

    <div class="payment-info">
        <h4>Información de Pago</h4>
        <p><strong>Método de Pago:</strong> {{ $comprobante->tipoDePago->metodo ?? 'N/A' }}</p>
        <p><strong>Fecha de Pago:</strong> {{ $comprobante->fecha ? \Carbon\Carbon::parse($comprobante->fecha)->format('d/m/Y') : 'N/A' }}</p>
        <p><strong>Hora de Pago:</strong> {{ $comprobante->hora ? \Carbon\Carbon::parse($comprobante->hora)->format('H:i') : 'N/A' }}</p>
    </div>

    <div class="footer">
        <p><strong>RAGNAROK BARBER SHOP</strong></p>
        <p>Gracias por su preferencia</p>
        <p>Este comprobante es válido como factura de venta</p>
    </div>
</body>
</html>

