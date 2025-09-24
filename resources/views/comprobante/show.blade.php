@extends('template')

@section('title', 'Ver Comprobante')

@section('content')
<h1 class="mt-4 px-5">Ver Comprobante</h1>
<ol class="breadcrumb mb-4 px-5">
    <li class="breadcrumb-item">
        <a href="{{ route('panel') }}">Inicio</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('comprobantes.index') }}">Comprobantes</a>
    </li>
    <li class="breadcrumb-item active">Ver Comprobante</li>
</ol>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Información del Comprobante</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>ID del Comprobante:</h5>
                            <p class="text-muted">{{ $comprobante->id_comprobante }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Fecha:</h5>
                            <p class="text-muted">{{ $comprobante->fecha ? \Carbon\Carbon::parse($comprobante->fecha)->format('d/m/Y') : 'N/A' }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Hora:</h5>
                            <p class="text-muted">{{ $comprobante->hora ? \Carbon\Carbon::parse($comprobante->hora)->format('H:i') : 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Tipo de Pago:</h5>
                            <p class="text-muted">{{ $comprobante->tipoDePago->metodo ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h5>Información de la Venta:</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>ID Venta:</strong> {{ $comprobante->venta->id_venta ?? 'N/A' }}<br>
                                            <strong>Cliente:</strong> {{ $comprobante->venta->cliente->persona->nombre ?? 'N/A' }} {{ $comprobante->venta->cliente->persona->apellido ?? '' }}<br>
                                            <strong>Servicio:</strong> {{ $comprobante->venta->servicio->nombre ?? 'N/A' }}
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Valor:</strong> ${{ number_format($comprobante->venta->valor ?? 0, 0, ',', '.') }}<br>
                                            <strong>Cantidad:</strong> {{ $comprobante->venta->cantidad ?? 'N/A' }}<br>
                                            <strong>Total:</strong> ${{ number_format($comprobante->venta->total ?? 0, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('comprobantes.edit', $comprobante) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Editar Comprobante
                        </a>
                        <a href="{{ route('comprobantes.pdf', $comprobante) }}" class="btn btn-success" target="_blank">
                            <i class="fas fa-file-pdf"></i> Descargar PDF
                        </a>
                        <a href="{{ route('comprobantes.view-pdf', $comprobante) }}" class="btn btn-info" target="_blank">
                            <i class="fas fa-eye"></i> Ver PDF
                        </a>
                        <a href="{{ route('comprobantes.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver a la Lista
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
