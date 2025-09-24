@extends('template')

@section('title', 'Ver Administrador')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Ver Administrador</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('administradores.index') }}">Administradores</a>
        </li>
        <li class="breadcrumb-item active">Ver Administrador</li>
    </ol>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-user-shield me-1"></i>
            Información del Administrador
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información Personal</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th>ID:</th>
                            <td>{{ $administrador->id_admin }}</td>
                        </tr>
                        <tr>
                            <th>Nombre:</th>
                            <td>{{ $administrador->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Apellido:</th>
                            <td>{{ $administrador->apellido }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>{{ $administrador->telefono }}</td>
                        </tr>
                        <tr>
                            <th>Correo:</th>
                            <td>{{ $administrador->correo ?? 'No especificado' }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Registro:</th>
                            <td>{{ $administrador->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Última Actualización:</th>
                            <td>{{ $administrador->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('administradores.edit', $administrador) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('administradores.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection



