<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Barbero;
use App\Models\Cliente;
use App\Models\Cita;
use App\Models\Servicio;
use App\Models\Venta;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        // Estadísticas de usuarios por rol
        $totalAdministradores = Administrador::count();
        $totalBarberos = Barbero::count();
        $totalClientes = Cliente::count();
        $totalUsuarios = $totalAdministradores + $totalBarberos + $totalClientes;

        // Estadísticas de citas
        $totalCitas = Cita::count();
        $citasPendientes = Cita::where('estado', 'pendiente')->count();
        $citasConfirmadas = Cita::where('estado', 'confirmada')->count();
        $citasCompletadas = Cita::where('estado', 'completada')->count();
        $citasCanceladas = Cita::where('estado', 'cancelada')->count();

        // Estadísticas de servicios
        $totalServicios = Servicio::count();

        // Estadísticas de ventas
        $totalVentas = Venta::count();
        // Como la tabla ventas no tiene created_at, usamos el total de ventas
        $ventasHoy = 0; // No podemos calcular ventas de hoy sin created_at

        // Citas de hoy
        $citasHoy = Cita::whereDate('fecha', today())->count();

        // Últimas citas (ordenadas por fecha)
        $ultimasCitas = Cita::with(['cliente', 'barbero'])
            ->orderBy('fecha', 'desc')
            ->limit(5)
            ->get();

        // Citas por estado (para gráfico)
        $citasPorEstado = [
            'pendiente' => $citasPendientes,
            'confirmada' => $citasConfirmadas,
            'completada' => $citasCompletadas,
            'cancelada' => $citasCanceladas,
        ];

        return view('panel.index', compact(
            'totalUsuarios',
            'totalAdministradores',
            'totalBarberos',
            'totalClientes',
            'totalCitas',
            'citasPendientes',
            'citasConfirmadas',
            'citasCompletadas',
            'citasCanceladas',
            'totalServicios',
            'totalVentas',
            'ventasHoy',
            'citasHoy',
            'ultimasCitas',
            'citasPorEstado'
        ));
    }
}