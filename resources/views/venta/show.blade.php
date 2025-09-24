@extends('template')

@section('title', 'Ver Venta')

@section('content')
    <h1 class="mt-4 px-5">Detalles de la Venta</h1>

    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('ventas.index') }}">Ventas</a>
        </li>
        <li class="breadcrumb-item active">Ver Venta</li>
    </ol>

    <div class="card mb-4 px-5">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Información de la Venta</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>ID de la Venta:</h5>
                    <p class="text-muted">{{ $venta->id_venta }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Cliente:</h5>
                    <p class="text-muted">{{ $venta->cliente->nombre ?? 'N/A' }} {{ $venta->cliente->apellido ?? '' }}</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <h5>Servicio:</h5>
                    <p class="text-muted">{{ $venta->servicio->nombre ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Valor Unitario:</h5>
                    <p class="text-muted">${{ number_format($venta->valor, 0, ',', '.') }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h5>Cantidad:</h5>
                    <p class="text-muted">{{ $venta->cantidad }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Total:</h5>
                    <p class="text-muted"><strong>${{ number_format($venta->total, 0, ',', '.') }}</strong></p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('ventas.edit', $venta) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Venta
                </a>
                <a href="{{ route('ventas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver a la Lista
                </a>
            </div>
        </div>
    </div>
@endsection



