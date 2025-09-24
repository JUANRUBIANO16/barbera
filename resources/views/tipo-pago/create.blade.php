@extends('template')

@section('title', 'Crear Tipo de Pago')

@section('content')
<h1 class="mt-4 px-5">Crear Tipo de Pago</h1>
<ol class="breadcrumb mb-4 px-5">
    <li class="breadcrumb-item">
        <a href="{{ route('panel') }}">Inicio</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('tipo-pagos.index') }}">Tipos de Pago</a>
    </li>
    <li class="breadcrumb-item active">Crear Tipo de Pago</li>
</ol>

<div class="container w-100 border-3 border primary rounded p-4 mt-3">

<form action="{{route('tipo-pagos.store')}}" method="post">
    @csrf
<div class="row g-3">
    <div class="col-md-12">
        <label for="metodo" class="form-label">Método de Pago *</label>
        <input type="text" name="metodo" id="metodo" class="form-control" value="{{old('metodo')}}" required maxlength="50">
    @error('metodo')
   <small class="text-danger">{{'*'.$message}}</small>
    @enderror
    </div>

      <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Guardar Tipo de Pago</button>
        <a href="{{ route('tipo-pagos.index') }}" class="btn btn-secondary">Cancelar</a>
      </div>   
    
    </div>
</form>

</div>

@endsection

@push('js')
{{-- Aquí tu JS extra si necesitas --}}
@endpush



