<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Servicio;
use App\Models\Cliente;
use App\Models\Barbero;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::with(['servicio', 'cliente'])->get();
        return view('venta.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicios = Servicio::all();
        $clientes = Cliente::all();
        $barberos = Barbero::all();
        return view('venta.create', compact('servicios', 'clientes', 'barberos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'valor' => 'required|integer|min:0',
            'cantidad' => 'nullable|integer|min:1',
            'total' => 'nullable|integer|min:0',
            'id_serv' => 'required|exists:servicio,id_serv',
            'id_clie' => 'required|exists:cliente,id_clie',
            'id_barbero' => 'required|exists:barbero,id_barbero',
        ]);

        Venta::create($request->all());

        return redirect()->route('ventas.index')
            ->with('success', 'Venta creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        $venta->load(['servicio', 'cliente']);
        return view('venta.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        $servicios = Servicio::all();
        $clientes = Cliente::all();
        $barberos = Barbero::all();
        return view('venta.edit', compact('venta', 'servicios', 'clientes', 'barberos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'valor' => 'required|integer|min:0',
            'cantidad' => 'nullable|integer|min:1',
            'total' => 'nullable|integer|min:0',
            'id_serv' => 'required|exists:servicio,id_serv',
            'id_clie' => 'required|exists:cliente,id_clie',
            'id_barbero' => 'required|exists:barbero,id_barbero',
        ]);

        $venta->update($request->all());

        return redirect()->route('ventas.index')
            ->with('success', 'Venta actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();

        return redirect()->route('ventas.index')
            ->with('success', 'Venta eliminada exitosamente.');
    }
}
