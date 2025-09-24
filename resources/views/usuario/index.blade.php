@extends('template')

@section('title', 'Usuarios')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Usuarios</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Usuarios</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-users me-1"></i>
            Lista de Usuarios
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-sm float-end">
                <i class="fas fa-plus"></i> Nuevo Usuario
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id_usuario }}</td>
                                <td>
                                    @if($usuario->cliente)
                                        <span class="badge bg-primary">Cliente</span>
                                    @elseif($usuario->barbero)
                                        <span class="badge bg-success">Barbero</span>
                                    @elseif($usuario->administrador)
                                        <span class="badge bg-warning">Administrador</span>
                                    @endif
                                </td>
                                <td>
                                    @if($usuario->cliente)
                                        {{ $usuario->cliente->nombre }}
                                    @elseif($usuario->barbero)
                                        {{ $usuario->barbero->nombre }}
                                    @elseif($usuario->administrador)
                                        {{ $usuario->administrador->nombre }}
                                    @endif
                                </td>
                                <td>
                                    @if($usuario->cliente)
                                        {{ $usuario->cliente->apellido }}
                                    @elseif($usuario->barbero)
                                        {{ $usuario->barbero->apellido }}
                                    @elseif($usuario->administrador)
                                        {{ $usuario->administrador->apellido }}
                                    @endif
                                </td>
                                <td>
                                    @if($usuario->cliente)
                                        {{ $usuario->cliente->telefono }}
                                    @elseif($usuario->barbero)
                                        {{ $usuario->barbero->telefono }}
                                    @elseif($usuario->administrador)
                                        {{ $usuario->administrador->telefono }}
                                    @endif
                                </td>
                                <td>
                                    @if($usuario->cliente)
                                        {{ $usuario->cliente->correo ?? 'N/A' }}
                                    @elseif($usuario->barbero)
                                        N/A
                                    @elseif($usuario->administrador)
                                        {{ $usuario->administrador->correo ?? 'N/A' }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('usuarios.show', $usuario) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No hay usuarios registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection