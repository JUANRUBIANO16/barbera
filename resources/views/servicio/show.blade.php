@extends('template')

@section('title', 'Ver Servicio')

@section('content')
    <h1 class="mt-4 px-5">Detalles del Servicio</h1>

    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('servicios.index') }}">Servicios</a>
        </li>
        <li class="breadcrumb-item active">Ver Servicio</li>
    </ol>

    <div class="card mb-4 px-5">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Información del Servicio</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>ID del Servicio:</h5>
                    <p class="text-muted">{{ $servicio->id_serv }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Nombre:</h5>
                    <p class="text-muted">{{ $servicio->nombre }}</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <h5>Precio:</h5>
                    <p class="text-muted">${{ number_format($servicio->precio, 0, ',', '.') }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Descripción:</h5>
                    <p class="text-muted">{{ $servicio->descripcion }}</p>
                </div>
            </div>

            @if($servicio->imagen)
            <div class="row mt-3">
                <div class="col-md-12">
                    <h5>Imagen del Servicio:</h5>
                    <img src="{{ asset($servicio->imagen) }}" alt="{{ $servicio->nombre }}" class="img-fluid rounded" style="max-width: 400px;">
                </div>
            </div>
            @endif

            <div class="mt-4">
                <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Servicio
                </a>
                <a href="{{ route('servicios.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver a la Lista
                </a>
            </div>
        </div>
    </div>
@endsection
