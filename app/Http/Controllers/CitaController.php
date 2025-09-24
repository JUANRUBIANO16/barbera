<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Barbero;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::with(['cliente', 'barbero'])->get();
        return view('cita.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $barberos = Barbero::all();
        return view('cita.create', compact('clientes', 'barberos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'estado' => 'nullable|string|max:10',
            'descripcion' => 'nullable|string|max:30',
            'id_clie' => 'required|exists:cliente,id_clie',
            'id_barbero' => 'required|exists:barbero,id_barbero',
        ]);

        Cita::create($request->all());

        return redirect()->route('citas.index')
            ->with('success', 'Cita creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        $cita->load(['cliente', 'barbero']);
        return view('cita.show', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        $clientes = Cliente::all();
        $barberos = Barbero::all();
        return view('cita.edit', compact('cita', 'clientes', 'barberos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'estado' => 'nullable|string|max:10',
            'descripcion' => 'nullable|string|max:30',
            'id_clie' => 'required|exists:cliente,id_clie',
            'id_barbero' => 'required|exists:barbero,id_barbero',
        ]);

        $cita->update($request->all());

        return redirect()->route('citas.index')
            ->with('success', 'Cita actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();

        return redirect()->route('citas.index')
            ->with('success', 'Cita eliminada exitosamente.');
    }
}
