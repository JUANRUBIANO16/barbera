<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\BarberoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DisponibilidadController;
use App\Http\Controllers\TipoPagoController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ComprobanteController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\BarberiaController;
use App\Http\Controllers\SolicitudCitaController;
use App\Http\Controllers\AuthController;

Route::get('/barber', [BarberiaController::class, 'inicio'])->name('barberia.inicio');

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Panel protegido
Route::get('/panel', [AuthController::class, 'dashboard'])->name('panel');

// Rutas solo para administradores
Route::middleware(['role:administrador'])->group(function () {
    // Rutas para el módulo de Usuarios
    Route::resource('usuarios', UsuarioController::class);
    
    // Rutas para solicitudes de citas
    Route::get('/solicitudes', [SolicitudCitaController::class, 'index'])->name('solicitudes.index');
    Route::post('/solicitudes/{id}/marcar-leida', [SolicitudCitaController::class, 'marcarLeida'])->name('solicitudes.marcar-leida');
    Route::post('/solicitudes/{id}/cambiar-estado', [SolicitudCitaController::class, 'cambiarEstado'])->name('solicitudes.cambiar-estado');
    Route::get('/api/notificaciones', [SolicitudCitaController::class, 'getNotificaciones'])->name('api.notificaciones');
    
    // Rutas para ventas
    Route::resource('ventas', VentaController::class);
    
    // Rutas para comprobantes
    Route::resource('comprobantes', ComprobanteController::class);
    
    // Rutas para tipos de pago
    Route::resource('tipo-pagos', TipoPagoController::class);
});

// Rutas para administradores y barberos
Route::middleware(['role:administrador,barbero'])->group(function () {
    // Rutas para servicios
    Route::resource('servicios', ServicioController::class);
    
    // Rutas para citas
    Route::resource('citas', CitaController::class);
});

// Rutas solo para barberos
Route::middleware(['role:barbero'])->group(function () {
    // Rutas para disponibilidad
    Route::resource('disponibilidades', DisponibilidadController::class);
});

// Los clientes no tienen acceso al sistema administrativo
// Solo pueden usar el formulario público de la página web

// Rutas públicas
Route::post('/solicitud-cita', [SolicitudCitaController::class, 'store'])->name('solicitud.store');

// Rutas adicionales para comprobantes (PDF)
Route::get('comprobantes/{comprobante}/pdf', [ComprobanteController::class, 'pdf'])->name('comprobantes.pdf');
Route::get('comprobantes/{comprobante}/view-pdf', [ComprobanteController::class, 'viewPdf'])->name('comprobantes.view-pdf');
