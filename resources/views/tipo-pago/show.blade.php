@extends('template')

@section('title', 'Ver Tipo de Pago')

@section('content')
    <h1 class="mt-4 px-5">Detalles del Tipo de Pago</h1>

    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('tipo-pagos.index') }}">Tipos de Pago</a>
        </li>
        <li class="breadcrumb-item active">Ver Tipo de Pago</li>
    </ol>

    <div class="card mb-4 px-5">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Información del Tipo de Pago</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>ID del Tipo de Pago:</h5>
                    <p class="text-muted">{{ $tipoPago->id_tipo_pago }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Método de Pago:</h5>
                    <p class="text-muted">{{ $tipoPago->metodo }}</p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('tipo-pagos.edit', $tipoPago) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Tipo de Pago
                </a>
                <a href="{{ route('tipo-pagos.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver a la Lista
                </a>
            </div>
        </div>
    </div>
@endsection



