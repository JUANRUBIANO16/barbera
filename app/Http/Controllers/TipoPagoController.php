<?php

namespace App\Http\Controllers;

use App\Models\TipoPago;
use Illuminate\Http\Request;

class TipoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposPago = TipoPago::all();
        return view('tipo-pago.index', compact('tiposPago'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo-pago.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'metodo' => 'required|string|max:50',
        ]);

        TipoPago::create($request->all());

        return redirect()->route('tipo-pagos.index')
            ->with('success', 'Tipo de pago creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoPago $tipoPago)
    {
        return view('tipo-pago.show', compact('tipoPago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoPago $tipoPago)
    {
        return view('tipo-pago.edit', compact('tipoPago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoPago $tipoPago)
    {
        $request->validate([
            'metodo' => 'required|string|max:50',
        ]);

        $tipoPago->update($request->all());

        return redirect()->route('tipo-pagos.index')
            ->with('success', 'Tipo de pago actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoPago $tipoPago)
    {
        $tipoPago->delete();

        return redirect()->route('tipo-pagos.index')
            ->with('success', 'Tipo de pago eliminado exitosamente.');
    }
}
