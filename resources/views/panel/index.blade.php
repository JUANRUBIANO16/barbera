@extends('template')

@section('title', 'Panel de Administración')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Panel de Administración</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
            Bienvenido, {{ session('user_name', 'Usuario') }} 
            <span class="badge bg-primary ms-2">{{ ucfirst(session('user_type', 'usuario')) }}</span>
            <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-danger ms-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </a>
        </li>
    </ol>
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Notificaciones en tiempo real -->
    <div id="notificaciones-container" class="position-fixed" style="top: 20px; right: 20px; z-index: 1050;">
        <!-- Las notificaciones se mostrarán aquí -->
    </div>

    <!-- Estadísticas principales -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="h4 mb-0">{{ $totalUsuarios }}</div>
                            <div>Total Usuarios</div>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('usuarios.index') }}">Ver Detalles</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="h4 mb-0">{{ $totalServicios }}</div>
                            <div>Total Servicios</div>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-cut fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('servicios.index') }}">Ver Detalles</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="h4 mb-0">{{ $totalCitas }}</div>
                            <div>Total Citas</div>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-calendar-alt fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('citas.index') }}">Ver Detalles</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="h4 mb-0">{{ $citasPendientes }}</div>
                            <div>Citas Pendientes</div>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('citas.index') }}">Ver Detalles</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas detalladas -->
    <div class="row">
        <!-- Usuarios por rol -->
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-users me-1"></i>
                    Usuarios por Rol
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="border rounded p-3">
                                <div class="h3 text-danger">{{ $totalAdministradores }}</div>
                                <div class="text-muted">Administradores</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border rounded p-3">
                                <div class="h3 text-warning">{{ $totalBarberos }}</div>
                                <div class="text-muted">Barberos</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border rounded p-3">
                                <div class="h3 text-info">{{ $totalClientes }}</div>
                                <div class="text-muted">Clientes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estado de citas -->
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-calendar-check me-1"></i>
                    Estado de Citas
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-3">
                            <div class="border rounded p-2">
                                <div class="h4 text-warning">{{ $citasPendientes }}</div>
                                <div class="small text-muted">Pendientes</div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="border rounded p-2">
                                <div class="h4 text-primary">{{ $citasConfirmadas }}</div>
                                <div class="small text-muted">Confirmadas</div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="border rounded p-2">
                                <div class="h4 text-success">{{ $citasCompletadas }}</div>
                                <div class="small text-muted">Completadas</div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="border rounded p-2">
                                <div class="h4 text-danger">{{ $citasCanceladas }}</div>
                                <div class="small text-muted">Canceladas</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas adicionales -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-line me-1"></i>
                    Estadísticas Adicionales
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="border rounded p-3">
                                <div class="h4 text-success">{{ $totalVentas }}</div>
                                <div class="text-muted">Total Ventas</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border rounded p-3">
                                <div class="h4 text-info">{{ $citasHoy }}</div>
                                <div class="text-muted">Citas Hoy</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Últimas citas -->
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-calendar-alt me-1"></i>
                    Últimas Citas
                </div>
                <div class="card-body">
                    @if($ultimasCitas->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Barbero</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ultimasCitas as $cita)
                                        <tr>
                                            <td>{{ $cita->cliente->nombre ?? 'N/A' }} {{ $cita->cliente->apellido ?? '' }}</td>
                                            <td>{{ $cita->barbero->nombre ?? 'N/A' }} {{ $cita->barbero->apellido ?? '' }}</td>
                                            <td>{{ $cita->fecha ? \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') : 'N/A' }}</td>
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted text-center">No hay citas registradas</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
// Sistema de notificaciones en tiempo real
let notificacionesActivas = new Set();

function mostrarNotificacion(solicitud) {
    const container = document.getElementById('notificaciones-container');
    const notificacionId = `notif-${solicitud.id}`;
    
    // Evitar duplicados
    if (notificacionesActivas.has(notificacionId)) return;
    notificacionesActivas.add(notificacionId);
    
    const notificacion = document.createElement('div');
    notificacion.id = notificacionId;
    notificacion.className = 'alert alert-info alert-dismissible fade show mb-2';
    notificacion.style.minWidth = '300px';
    notificacion.innerHTML = `
        <div class="d-flex align-items-center">
            <i class="fas fa-bell me-2"></i>
            <div>
                <strong>Nueva Solicitud de Cita</strong><br>
                <small>${solicitud.nombre} - ${solicitud.servicio}</small>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="marcarComoLeida(${solicitud.id})"></button>
    `;
    
    container.appendChild(notificacion);
    
    // Auto-ocultar después de 10 segundos
    setTimeout(() => {
        if (notificacion.parentNode) {
            notificacion.remove();
            notificacionesActivas.delete(notificacionId);
        }
    }, 10000);
}

function marcarComoLeida(id) {
    fetch(`/solicitudes/${id}/marcar-leida`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    });
}

function verificarNotificaciones() {
    fetch('/api/notificaciones')
        .then(response => response.json())
        .then(data => {
            // Mostrar nuevas solicitudes
            data.ultimas.forEach(solicitud => {
                if (!solicitud.leida) {
                    mostrarNotificacion(solicitud);
                }
            });
        })
        .catch(error => console.error('Error:', error));
}

// Verificar notificaciones cada 5 segundos
setInterval(verificarNotificaciones, 5000);

// Verificar inmediatamente al cargar la página
document.addEventListener('DOMContentLoaded', verificarNotificaciones);
</script>
@endpush
