<?php

namespace App\Http\Controllers;

use App\Models\Barbero;
use Illuminate\Http\Request;

class BarberoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barberos = Barbero::all();
        return view('barbero.index', compact('barberos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barbero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:30',
            'apellido' => 'required|string|max:30',
            'disponibilidad' => 'nullable|string|max:10',
            'telefono' => 'required|integer',
            'num_doc' => 'nullable|integer',
            'salario' => 'nullable|integer',
            'edad' => 'nullable|integer|min:1|max:120',
        ]);

        Barbero::create($request->all());

        return redirect()->route('barberos.index')
            ->with('success', 'Barbero creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barbero $barbero)
    {
        return view('barbero.show', compact('barbero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barbero $barbero)
    {
        return view('barbero.edit', compact('barbero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barbero $barbero)
    {
        $request->validate([
            'nombre' => 'required|string|max:30',
            'apellido' => 'required|string|max:30',
            'disponibilidad' => 'nullable|string|max:10',
            'telefono' => 'required|integer',
            'num_doc' => 'nullable|integer',
            'salario' => 'nullable|integer',
            'edad' => 'nullable|integer|min:1|max:120',
        ]);

        $barbero->update($request->all());

        return redirect()->route('barberos.index')
            ->with('success', 'Barbero actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barbero $barbero)
    {
        $barbero->delete();

        return redirect()->route('barberos.index')
            ->with('success', 'Barbero eliminado exitosamente.');
    }
}
