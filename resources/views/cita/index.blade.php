@extends('template')

@section('title', 'Citas')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <h1 class="mt-4 px-5">Citas</h1>

    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item active">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Citas</li>
    </ol>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="mb-4 px-5">
    <a href="{{ route('citas.create') }}">
        <button type="button" class="btn btn-primary">Añadir nueva cita</button>
    </a>
    </div>

    <div class="card px-5">
        <div class="card-header">
            <i class="fas fa-calendar-alt me-1"></i>
            Lista de Citas
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Barbero</th>
                        <th>Fecha y Hora</th>
                        <th>Estado</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($citas as $cita)
                        <tr>
                            <td>{{ $cita->id_cita }}</td>
                            <td>{{ $cita->cliente->nombre ?? 'N/A' }} {{ $cita->cliente->apellido ?? '' }}</td>
                            <td>{{ $cita->barbero->nombre ?? 'N/A' }} {{ $cita->barbero->apellido ?? '' }}</td>
                            <td>{{ $cita->fecha ? \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') : 'N/A' }} {{ $cita->hora ? \Carbon\Carbon::parse($cita->hora)->format('H:i') : '' }}</td>
                            <td>
                                @switch($cita->estado)
                                    @case('pendiente')
                                        <span class="badge bg-warning">Pendiente</span>
                                        @break
                                    @case('confirmada')
                                        <span class="badge bg-info">Confirmada</span>
                                        @break
                                    @case('completada')
                                        <span class="badge bg-success">Completada</span>
                                        @break
                                    @case('cancelada')
                                        <span class="badge bg-danger">Cancelada</span>
                                        @break
                                    @default
                                        <span class="badge bg-secondary">{{ $cita->estado ?? 'Sin estado' }}</span>
                                @endswitch
                            </td>
                            <td>{{ $cita->descripcion ?? 'Sin descripción' }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <a href="{{ route('citas.show', $cita) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('citas.edit', $cita) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('citas.destroy', $cita) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta cita?')">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/datatables-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
@endpush
