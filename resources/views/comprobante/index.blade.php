@extends('template')

@section('title', 'Comprobantes')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <h1 class="mt-4 px-5">Comprobantes</h1>

    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item active">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Comprobantes</li>
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
        <a href="{{ route('comprobantes.create') }}">
            <button type="button" class="btn btn-primary">Añadir nuevo comprobante</button>
        </a>
    </div>

    <div class="card px-5">
        <div class="card-header">
            <i class="fas fa-receipt me-1"></i>
            Lista de Comprobantes
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Venta</th>
                        <th>Tipo de Pago</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($comprobantes as $comprobante)
                        <tr>
                            <td>{{ $comprobante->id_comprobante }}</td>
                            <td>Venta #{{ $comprobante->venta->id_venta ?? 'N/A' }}</td>
                            <td>{{ $comprobante->tipoDePago->metodo ?? 'N/A' }}</td>
                            <td>{{ $comprobante->fecha ? \Carbon\Carbon::parse($comprobante->fecha)->format('d/m/Y') : 'N/A' }}</td>
                            <td>{{ $comprobante->hora ? \Carbon\Carbon::parse($comprobante->hora)->format('H:i') : 'N/A' }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <a href="{{ route('comprobantes.show', $comprobante) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('comprobantes.edit', $comprobante) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="{{ route('comprobantes.pdf', $comprobante) }}" class="btn btn-success btn-sm" target="_blank" title="Descargar PDF">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                    <form action="{{ route('comprobantes.destroy', $comprobante) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este comprobante?')">Eliminar</button>
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
