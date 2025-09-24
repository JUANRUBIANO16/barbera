@extends('template')

@section('title', 'Administradores')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Administradores</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Administradores</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user-shield me-1"></i>
            Lista de Administradores
            <a href="{{ route('administradores.create') }}" class="btn btn-primary btn-sm float-end">
                <i class="fas fa-plus"></i> Nuevo Administrador
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
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($administradores as $administrador)
                            <tr>
                                <td>{{ $administrador->id_admin }}</td>
                                <td>{{ $administrador->nombre }}</td>
                                <td>{{ $administrador->apellido }}</td>
                                <td>{{ $administrador->telefono }}</td>
                                <td>{{ $administrador->correo }}</td>
                                <td>
                                    <a href="{{ route('administradores.show', $administrador) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('administradores.edit', $administrador) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('administradores.destroy', $administrador) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este administrador?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No hay administradores registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


