@extends('template')

@section('title', 'Ventas')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <h1 class="mt-4 px-5">Ventas</h1>

    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item active">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Ventas</li>
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
        <a href="{{ route('ventas.create') }}">
            <button type="button" class="btn btn-primary">Añadir nueva venta</button>
        </a>
    </div>

    <div class="card px-5">
        <div class="card-header">
            <i class="fas fa-shopping-cart me-1"></i>
            Lista de Ventas
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Servicio</th>
                        <th>Valor</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id_venta }}</td>
                            <td>{{ $venta->cliente->nombre ?? 'N/A' }} {{ $venta->cliente->apellido ?? '' }}</td>
                            <td>{{ $venta->servicio->nombre ?? 'N/A' }}</td>
                            <td>${{ number_format($venta->valor, 0, ',', '.') }}</td>
                            <td>{{ $venta->cantidad }}</td>
                            <td>${{ number_format($venta->total, 0, ',', '.') }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <a href="{{ route('ventas.show', $venta) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('ventas.edit', $venta) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('ventas.destroy', $venta) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta venta?')">Eliminar</button>
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




