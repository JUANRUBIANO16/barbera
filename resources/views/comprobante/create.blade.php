@extends('template')

@section('title', 'Crear Comprobante')

@section('content')
<h1 class="mt-4 px-5">Crear Comprobante</h1>
<ol class="breadcrumb mb-4 px-5">
    <li class="breadcrumb-item">
        <a href="{{ route('panel') }}">Inicio</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('comprobantes.index') }}">Comprobantes</a>
    </li>
    <li class="breadcrumb-item active">Crear Comprobante</li>
</ol>

<div class="container w-100 border-3 border primary rounded p-4 mt-3">

<form action="{{route('comprobantes.store')}}" method="post">
    @csrf
<div class="row g-3">
    <div class="col-md-6">
        <label for="id_venta" class="form-label">Venta *</label>
        <select name="id_venta" id="id_venta" class="form-control" required>
            <option value="">Seleccionar venta</option>
            @foreach($ventas as $venta)
                <option value="{{ $venta->id_venta }}" {{ old('id_venta') == $venta->id_venta ? 'selected' : '' }}>
                    Venta #{{ $venta->id_venta }} - {{ $venta->cliente->persona->nombre ?? 'N/A' }} {{ $venta->cliente->persona->apellido ?? '' }} - ${{ number_format($venta->total, 0, ',', '.') }}
                </option>
            @endforeach
        </select>
    @error('id_venta')
   <small class="text-danger">{{'*'.$message}}</small>
    @enderror
    </div>

    <div class="col-md-6">
        <label for="id_tipo_pago" class="form-label">Tipo de Pago *</label>
        <select name="id_tipo_pago" id="id_tipo_pago" class="form-control" required>
            <option value="">Seleccionar tipo de pago</option>
            @foreach($tiposPago as $tipoPago)
                <option value="{{ $tipoPago->id_tipo_pago }}" {{ old('id_tipo_pago') == $tipoPago->id_tipo_pago ? 'selected' : '' }}>
                    {{ $tipoPago->metodo }}
                </option>
            @endforeach
        </select>
    @error('id_tipo_pago')
   <small class="text-danger">{{'*'.$message}}</small>
    @enderror
    </div>

    <div class="col-md-6">
        <label for="fecha" class="form-label">Fecha *</label>
        <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha', date('Y-m-d')) }}" required>
    @error('fecha')
   <small class="text-danger">{{'*'.$message}}</small>
    @enderror
    </div>

    <div class="col-md-6">
        <label for="hora" class="form-label">Hora *</label>
        <input type="time" name="hora" id="hora" class="form-control" value="{{ old('hora', date('H:i')) }}" required>
    @error('hora')
   <small class="text-danger">{{'*'.$message}}</small>
    @enderror
    </div>

      <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Guardar Comprobante</button>
        <a href="{{ route('comprobantes.index') }}" class="btn btn-secondary">Cancelar</a>
      </div>   
    
    </div>
</form>
</div>
@endsection




