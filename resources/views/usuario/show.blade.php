@extends('template')

@section('title', 'Ver Usuario')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Ver Usuario</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('usuarios.index') }}">Usuarios</a>
        </li>
        <li class="breadcrumb-item active">Ver Usuario</li>
    </ol>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-user me-1"></i>
            Información del Usuario
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información General</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th>ID:</th>
                            <td>{{ $usuario->id_usuario }}</td>
                        </tr>
                        <tr>
                            <th>Tipo:</th>
                            <td>
                                @if($usuario->cliente)
                                    <span class="badge bg-primary">Cliente</span>
                                @elseif($usuario->barbero)
                                    <span class="badge bg-success">Barbero</span>
                                @elseif($usuario->administrador)
                                    <span class="badge bg-warning">Administrador</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Nombre:</th>
                            <td>
                                @if($usuario->cliente)
                                    {{ $usuario->cliente->nombre }} {{ $usuario->cliente->apellido }}
                                @elseif($usuario->barbero)
                                    {{ $usuario->barbero->nombre }} {{ $usuario->barbero->apellido }}
                                @elseif($usuario->administrador)
                                    {{ $usuario->administrador->nombre }} {{ $usuario->administrador->apellido }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>
                                @if($usuario->cliente)
                                    {{ $usuario->cliente->telefono }}
                                @elseif($usuario->barbero)
                                    {{ $usuario->barbero->telefono }}
                                @elseif($usuario->administrador)
                                    {{ $usuario->administrador->telefono }}
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-6">
                    <h5>Información Específica</h5>
                    <table class="table table-borderless">
                        @if($usuario->cliente)
                            <tr>
                                <th>Dirección:</th>
                                <td>{{ $usuario->cliente->direccion ?? 'No especificada' }}</td>
                            </tr>
                            <tr>
                                <th>Correo:</th>
                                <td>{{ $usuario->cliente->correo ?? 'No especificado' }}</td>
                            </tr>
                        @elseif($usuario->barbero)
                            <tr>
                                <th>Disponibilidad:</th>
                                <td>
                                    <span class="badge {{ $usuario->barbero->disponibilidad == 'disponible' ? 'bg-success' : 'bg-warning' }}">
                                        {{ $usuario->barbero->disponibilidad ?? 'No especificado' }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Número de Documento:</th>
                                <td>{{ $usuario->barbero->num_doc ?? 'No especificado' }}</td>
                            </tr>
                            <tr>
                                <th>Salario:</th>
                                <td>${{ number_format($usuario->barbero->salario ?? 0) }}</td>
                            </tr>
                            <tr>
                                <th>Edad:</th>
                                <td>{{ $usuario->barbero->edad ?? 'No especificada' }}</td>
                            </tr>
                        @elseif($usuario->administrador)
                            <tr>
                                <th>Correo:</th>
                                <td>{{ $usuario->administrador->correo ?? 'No especificado' }}</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Usuario
                </a>
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection