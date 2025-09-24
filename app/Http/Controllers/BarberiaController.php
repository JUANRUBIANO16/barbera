<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class BarberiaController extends Controller
{
    public function inicio()
    {
        // Obtener todos los servicios activos
        $servicios = Servicio::all();
        
        return view('barberia.inicio', compact('servicios'));
    }
}
