@extends('template')

@section('title', 'Ver Disponibilidad')

@section('content')
    <h1 class="mt-4 px-5">Detalles de la Disponibilidad</h1>

    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('disponibilidades.index') }}">Disponibilidad</a>
        </li>
        <li class="breadcrumb-item active">Ver Disponibilidad</li>
    </ol>

    <div class="card mb-4 px-5">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Información de la Disponibilidad</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>ID de la Disponibilidad:</h5>
                    <p class="text-muted">{{ $disponibilidad->id_disp }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Barbero:</h5>
                    <p class="text-muted">{{ $disponibilidad->barbero->nombre ?? 'N/A' }} {{ $disponibilidad->barbero->apellido ?? '' }}</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <h5>Fecha:</h5>
                    <p class="text-muted">{{ $disponibilidad->fecha ? \Carbon\Carbon::parse($disponibilidad->fecha)->format('d/m/Y') : 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Hora de Inicio:</h5>
                    <p class="text-muted">{{ $disponibilidad->hora_de_inicio ? \Carbon\Carbon::parse($disponibilidad->hora_de_inicio)->format('H:i') : 'N/A' }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h5>Hora Final:</h5>
                    <p class="text-muted">{{ $disponibilidad->hora_final ? \Carbon\Carbon::parse($disponibilidad->hora_final)->format('H:i') : 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Duración:</h5>
                    <p class="text-muted">
                        @if($disponibilidad->hora_de_inicio && $disponibilidad->hora_final)
                            @php
                                $inicio = \Carbon\Carbon::parse($disponibilidad->hora_de_inicio);
                                $final = \Carbon\Carbon::parse($disponibilidad->hora_final);
                                $duracion = $inicio->diffInHours($final);
                            @endphp
                            {{ $duracion }} horas
                        @else
                            N/A
                        @endif
                    </p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('disponibilidades.edit', $disponibilidad) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Disponibilidad
                </a>
                <a href="{{ route('disponibilidades.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver a la Lista
                </a>
            </div>
        </div>
    </div>
@endsection



