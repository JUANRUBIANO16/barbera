<?php

namespace App\Http\Controllers;

use App\Models\Disponibilidad;
use App\Models\Barbero;
use Illuminate\Http\Request;

class DisponibilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disponibilidades = Disponibilidad::with('barbero')->get();
        return view('disponibilidad.index', compact('disponibilidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barberos = Barbero::all();
        return view('disponibilidad.create', compact('barberos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora_de_inicio' => 'required|date_format:H:i',
            'hora_final' => 'required|date_format:H:i|after:hora_de_inicio',
            'id_barbero' => 'required|exists:barbero,id_barbero',
        ]);

        Disponibilidad::create($request->all());

        return redirect()->route('disponibilidades.index')
            ->with('success', 'Disponibilidad creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Disponibilidad $disponibilidad)
    {
        $disponibilidad->load('barbero');
        return view('disponibilidad.show', compact('disponibilidad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disponibilidad $disponibilidad)
    {
        $barberos = Barbero::all();
        return view('disponibilidad.edit', compact('disponibilidad', 'barberos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disponibilidad $disponibilidad)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora_de_inicio' => 'required|date_format:H:i',
            'hora_final' => 'required|date_format:H:i|after:hora_de_inicio',
            'id_barbero' => 'required|exists:barbero,id_barbero',
        ]);

        $disponibilidad->update($request->all());

        return redirect()->route('disponibilidades.index')
            ->with('success', 'Disponibilidad actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disponibilidad $disponibilidad)
    {
        $disponibilidad->delete();

        return redirect()->route('disponibilidades.index')
            ->with('success', 'Disponibilidad eliminada exitosamente.');
    }
}
