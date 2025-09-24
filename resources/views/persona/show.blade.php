@extends('template')

@section('title', 'Ver Persona')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Ver Persona</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('personas.index') }}">Personas</a>
        </li>
        <li class="breadcrumb-item active">Ver Persona</li>
    </ol>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-users me-1"></i>
            Información de la Persona
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información de la Persona</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th>ID Persona:</th>
                            <td>{{ $persona->id_persona }}</td>
                        </tr>
                        <tr>
                            <th>ID Administrador:</th>
                            <td>{{ $persona->id_admin ?? 'No asignado' }}</td>
                        </tr>
                        <tr>
                            <th>ID Barbero:</th>
                            <td>{{ $persona->id_barbero ?? 'No asignado' }}</td>
                        </tr>
                        <tr>
                            <th>ID Cliente:</th>
                            <td>{{ $persona->id_clie ?? 'No asignado' }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Registro:</th>
                            <td>{{ $persona->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Última Actualización:</th>
                            <td>{{ $persona->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('personas.edit', $persona) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('personas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection


