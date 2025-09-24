@extends('template')

@section('title', 'Servicios')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <h1 class="mt-4 px-5">Servicios</h1>

    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item active">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Servicios</li>
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
        <a href="{{ route('servicios.create') }}">
            <button type="button" class="btn btn-primary">Añadir nuevo servicio</button>
        </a>
    </div>

    <div class="card px-5">
        <div class="card-header">
            <i class="fas fa-cut me-1"></i>
            Lista de Servicios
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($servicios as $servicio)
                        <tr>
                            <td>{{ $servicio->id_serv }}</td>
                            <td>
                                @if($servicio->imagen)
                                    <img src="{{ asset($servicio->imagen) }}" alt="{{ $servicio->nombre }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <span class="text-muted">Sin imagen</span>
                                @endif
                            </td>
                            <td>{{ $servicio->nombre }}</td>
                            <td>${{ number_format($servicio->precio, 0, ',', '.') }}</td>
                            <td>{{ Str::limit($servicio->descripcion, 50) }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <a href="{{ route('servicios.show', $servicio) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este servicio?')">Eliminar</button>
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
