@extends('template')

@section('title', 'Ver Barbero')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Ver Barbero</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('barberos.index') }}">Barberos</a>
        </li>
        <li class="breadcrumb-item active">Ver Barbero</li>
    </ol>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-user-tie me-1"></i>
            Información del Barbero
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información Personal</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th>ID:</th>
                            <td>{{ $barbero->id_barbero }}</td>
                        </tr>
                        <tr>
                            <th>Nombre:</th>
                            <td>{{ $barbero->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Apellido:</th>
                            <td>{{ $barbero->apellido }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>{{ $barbero->telefono }}</td>
                        </tr>
                        <tr>
                            <th>Disponibilidad:</th>
                            <td>
                                <span class="badge {{ $barbero->disponibilidad == 'disponible' ? 'bg-success' : 'bg-warning' }}">
                                    {{ $barbero->disponibilidad ?? 'No especificado' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Número de Documento:</th>
                            <td>{{ $barbero->num_doc ?? 'No especificado' }}</td>
                        </tr>
                        <tr>
                            <th>Salario:</th>
                            <td>${{ number_format($barbero->salario ?? 0) }}</td>
                        </tr>
                        <tr>
                            <th>Edad:</th>
                            <td>{{ $barbero->edad ?? 'No especificada' }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Registro:</th>
                            <td>{{ $barbero->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Última Actualización:</th>
                            <td>{{ $barbero->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('barberos.edit', $barbero) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('barberos.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection



