@extends('template')

@section('title', 'Solicitudes de Citas')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Solicitudes de Citas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Panel</a>
        </li>
        <li class="breadcrumb-item active">Solicitudes</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-calendar-alt me-1"></i>
            Gestión de Solicitudes
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Servicio</th>
                            <th>Mensaje</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($solicitudes as $solicitud)
                            <tr class="{{ $solicitud->leida ? '' : 'table-warning' }}">
                                <td>{{ $solicitud->id }}</td>
                                <td>{{ $solicitud->nombre }}</td>
                                <td>{{ $solicitud->telefono }}</td>
                                <td>{{ $solicitud->email }}</td>
                                <td>{{ $solicitud->servicio }}</td>
                                <td>{{ $solicitud->mensaje ?? 'Sin mensaje' }}</td>
                                <td>
                                    <span class="badge bg-{{ $solicitud->estado == 'pendiente' ? 'warning' : ($solicitud->estado == 'confirmada' ? 'success' : 'danger') }}">
                                        {{ ucfirst($solicitud->estado) }}
                                    </span>
                                </td>
                                <td>{{ $solicitud->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    @if(!$solicitud->leida)
                                        <button class="btn btn-sm btn-info" onclick="marcarComoLeida({{ $solicitud->id }})">
                                            <i class="fas fa-eye"></i> Marcar como leída
                                        </button>
                                    @endif
                                    
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-success" onclick="cambiarEstado({{ $solicitud->id }}, 'confirmada')">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="cambiarEstado({{ $solicitud->id }}, 'cancelada')">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No hay solicitudes</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
function marcarComoLeida(id) {
    fetch(`/solicitudes/${id}/marcar-leida`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    });
}

function cambiarEstado(id, estado) {
    fetch(`/solicitudes/${id}/cambiar-estado`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ estado: estado })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    });
}
</script>
@endpush
