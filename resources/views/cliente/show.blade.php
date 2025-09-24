@extends('template')

@section('title', 'Ver Cliente')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Ver Cliente</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('clientes.index') }}">Clientes</a>
        </li>
        <li class="breadcrumb-item active">Ver Cliente</li>
    </ol>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-user me-1"></i>
            Información del Cliente
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información Personal</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th>ID:</th>
                            <td>{{ $cliente->id_clie }}</td>
                        </tr>
                        <tr>
                            <th>Nombre:</th>
                            <td>{{ $cliente->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Apellido:</th>
                            <td>{{ $cliente->apellido }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>{{ $cliente->telefono }}</td>
                        </tr>
                        <tr>
                            <th>Correo:</th>
                            <td>{{ $cliente->correo ?? 'No especificado' }}</td>
                        </tr>
                        <tr>
                            <th>Dirección:</th>
                            <td>{{ $cliente->direccion ?? 'No especificada' }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Registro:</th>
                            <td>{{ $cliente->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Última Actualización:</th>
                            <td>{{ $cliente->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection


