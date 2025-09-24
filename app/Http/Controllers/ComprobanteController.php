<?php

namespace App\Http\Controllers;

use App\Models\Comprobante;
use App\Models\Venta;
use App\Models\TipoPago;
use Illuminate\Http\Request;

class ComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comprobantes = Comprobante::with(['venta', 'tipoPago'])->get();
        return view('comprobante.index', compact('comprobantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ventas = Venta::all();
        $tiposPago = TipoPago::all();
        return view('comprobante.create', compact('ventas', 'tiposPago'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'id_venta' => 'required|exists:ventas,id_venta',
            'id_tipo_pago' => 'required|exists:tipo_de_pago,id_tipo_pago',
        ]);

        Comprobante::create($request->all());

        return redirect()->route('comprobantes.index')
            ->with('success', 'Comprobante creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comprobante $comprobante)
    {
        $comprobante->load(['venta', 'tipoPago']);
        return view('comprobante.show', compact('comprobante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comprobante $comprobante)
    {
        $ventas = Venta::all();
        $tiposPago = TipoPago::all();
        return view('comprobante.edit', compact('comprobante', 'ventas', 'tiposPago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comprobante $comprobante)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'id_venta' => 'required|exists:ventas,id_venta',
            'id_tipo_pago' => 'required|exists:tipo_de_pago,id_tipo_pago',
        ]);

        $comprobante->update($request->all());

        return redirect()->route('comprobantes.index')
            ->with('success', 'Comprobante actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comprobante $comprobante)
    {
        $comprobante->delete();

        return redirect()->route('comprobantes.index')
            ->with('success', 'Comprobante eliminado exitosamente.');
    }

    /**
     * Generate PDF for the comprobante.
     */
    public function pdf(Comprobante $comprobante)
    {
        $comprobante->load(['venta.servicio', 'venta.cliente', 'tipoPago']);
        return view('comprobante.pdf', compact('comprobante'));
    }
}
