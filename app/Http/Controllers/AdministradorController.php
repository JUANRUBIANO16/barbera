<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administradores = Administrador::all();
        return view('administrador.index', compact('administradores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrador.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:30',
            'apellido' => 'required|string|max:30',
            'telefono' => 'required|integer',
            'correo' => 'nullable|email|max:40',
        ]);

        Administrador::create($request->all());

        return redirect()->route('administradores.index')
            ->with('success', 'Administrador creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrador $administrador)
    {
        return view('administrador.show', compact('administrador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrador $administrador)
    {
        return view('administrador.edit', compact('administrador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrador $administrador)
    {
        $request->validate([
            'nombre' => 'required|string|max:30',
            'apellido' => 'required|string|max:30',
            'telefono' => 'required|integer',
            'correo' => 'nullable|email|max:40',
        ]);

        $administrador->update($request->all());

        return redirect()->route('administradores.index')
            ->with('success', 'Administrador actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrador $administrador)
    {
        $administrador->delete();

        return redirect()->route('administradores.index')
            ->with('success', 'Administrador eliminado exitosamente.');
    }
}
