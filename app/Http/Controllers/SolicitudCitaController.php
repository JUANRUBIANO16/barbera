<?php

namespace App\Http\Controllers;

use App\Models\SolicitudCita;
use Illuminate\Http\Request;

class SolicitudCitaController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:50',
                'telefono' => 'required|string|max:15',
                'email' => 'required|email|max:50',
                'servicio' => 'required|string|max:50',
                'mensaje' => 'nullable|string|max:500',
            ]);

            SolicitudCita::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Solicitud enviada correctamente. Te contactaremos pronto.'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error al crear solicitud: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Error al enviar la solicitud: ' . $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        $solicitudes = SolicitudCita::orderBy('created_at', 'desc')->get();
        return view('solicitudes.index', compact('solicitudes'));
    }

    public function marcarLeida($id)
    {
        $solicitud = SolicitudCita::findOrFail($id);
        $solicitud->update(['leida' => true]);
        
        return response()->json(['success' => true]);
    }

    public function cambiarEstado(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,confirmada,cancelada'
        ]);

        $solicitud = SolicitudCita::findOrFail($id);
        $solicitud->update(['estado' => $request->estado]);
        
        return response()->json(['success' => true]);
    }

    public function getNotificaciones()
    {
        $solicitudesPendientes = SolicitudCita::where('leida', false)->count();
        $ultimasSolicitudes = SolicitudCita::orderBy('created_at', 'desc')->limit(5)->get();
        
        return response()->json([
            'pendientes' => $solicitudesPendientes,
            'ultimas' => $ultimasSolicitudes
        ]);
    }
}