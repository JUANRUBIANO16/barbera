@extends('template')

@section('title', 'Personas')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Personas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Personas</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-users me-1"></i>
            Lista de Personas
            <a href="{{ route('personas.create') }}" class="btn btn-primary btn-sm float-end">
                <i class="fas fa-plus"></i> Nueva Persona
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
                            <th>ID Admin</th>
                            <th>ID Barbero</th>
                            <th>ID Cliente</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($personas as $persona)
                            <tr>
                                <td>{{ $persona->id_persona }}</td>
                                <td>{{ $persona->id_admin ?? 'N/A' }}</td>
                                <td>{{ $persona->id_barbero ?? 'N/A' }}</td>
                                <td>{{ $persona->id_clie ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('personas.show', $persona) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('personas.edit', $persona) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('personas.destroy', $persona) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta persona?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No hay personas registradas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection



