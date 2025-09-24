@extends('template')

@section('title', 'Disponibilidad')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <h1 class="mt-4 px-5">Disponibilidad</h1>

    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item active">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Disponibilidad</li>
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
        <a href="{{ route('disponibilidades.create') }}">
            <button type="button" class="btn btn-primary">Añadir nueva disponibilidad</button>
        </a>
    </div>

    <div class="card px-5">
        <div class="card-header">
            <i class="fas fa-clock me-1"></i>
            Lista de Disponibilidad
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Barbero</th>
                        <th>Fecha</th>
                        <th>Hora Inicio</th>
                        <th>Hora Final</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($disponibilidades as $disponibilidad)
                        <tr>
                            <td>{{ $disponibilidad->id_disp }}</td>
                            <td>{{ $disponibilidad->barbero->nombre ?? 'N/A' }} {{ $disponibilidad->barbero->apellido ?? '' }}</td>
                            <td>{{ $disponibilidad->fecha ? \Carbon\Carbon::parse($disponibilidad->fecha)->format('d/m/Y') : 'N/A' }}</td>
                            <td>{{ $disponibilidad->hora_de_inicio ? \Carbon\Carbon::parse($disponibilidad->hora_de_inicio)->format('H:i') : 'N/A' }}</td>
                            <td>{{ $disponibilidad->hora_final ? \Carbon\Carbon::parse($disponibilidad->hora_final)->format('H:i') : 'N/A' }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <a href="{{ route('disponibilidades.show', $disponibilidad) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('disponibilidades.edit', $disponibilidad) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('disponibilidades.destroy', $disponibilidad) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta disponibilidad?')">Eliminar</button>
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



