<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();
        return view('servicio.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:20',
            'precio' => 'required|integer|min:0',
            'descripcion' => 'required|string|max:100',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('servicios', 'public');
            $data['imagen'] = $imagePath;
        }

        Servicio::create($data);

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        return view('servicio.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        return view('servicio.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
        $request->validate([
            'nombre' => 'required|string|max:20',
            'precio' => 'required|integer|min:0',
            'descripcion' => 'required|string|max:100',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('imagen')) {
            // Delete old image if exists
            if ($servicio->imagen) {
                Storage::disk('public')->delete($servicio->imagen);
            }
            $imagePath = $request->file('imagen')->store('servicios', 'public');
            $data['imagen'] = $imagePath;
        }

        $servicio->update($data);

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        // Delete image if exists
        if ($servicio->imagen) {
            Storage::disk('public')->delete($servicio->imagen);
        }

        $servicio->delete();

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio eliminado exitosamente.');
    }
}
