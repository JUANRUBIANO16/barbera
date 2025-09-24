@extends('template')

@section('title', 'Barberos')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Barberos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Barberos</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user-tie me-1"></i>
            Lista de Barberos
            <a href="{{ route('barberos.create') }}" class="btn btn-primary btn-sm float-end">
                <i class="fas fa-plus"></i> Nuevo Barbero
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
                            <th>Disponibilidad</th>
                            <th>Teléfono</th>
                            <th>Salario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($barberos as $barbero)
                            <tr>
                                <td>{{ $barbero->id_barbero }}</td>
                                <td>{{ $barbero->nombre }}</td>
                                <td>{{ $barbero->apellido }}</td>
                                <td>
                                    <span class="badge {{ $barbero->disponibilidad == 'disponible' ? 'bg-success' : 'bg-warning' }}">
                                        {{ $barbero->disponibilidad ?? 'No especificado' }}
                                    </span>
                                </td>
                                <td>{{ $barbero->telefono }}</td>
                                <td>${{ number_format($barbero->salario ?? 0) }}</td>
                                <td>
                                    <a href="{{ route('barberos.show', $barbero) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('barberos.edit', $barbero) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('barberos.destroy', $barbero) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este barbero?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No hay barberos registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


