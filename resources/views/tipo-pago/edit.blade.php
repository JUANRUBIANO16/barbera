@extends('template')

@section('title','Editar Tipo de Pago')

@push('css')
@endpush

@section('content')
<div class="container">
    <h1 class="mt-4 px-5">Editar Tipo de Pago</h1>
    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('tipo-pagos.index') }}">Tipos de Pago</a>
        </li>
        <li class="breadcrumb-item active">Editar Tipo de Pago</li>
    </ol>

    <div class="container w-100 border-3 border primary rounded p-4 mt-3">

         <form action="{{ route('tipo-pagos.update', ['tipoPago' => $tipoPago]) }}" method="post">
            @csrf
            @method('PATCH')
            
            <div class="row g-3">
                <div class="col-md-12">
                    <label for="metodo" class="form-label">Método de Pago *</label>
                    <input type="text" name="metodo" id="metodo" class="form-control" value="{{ old('metodo', $tipoPago->metodo) }}" required maxlength="50">
                    @error('metodo')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                 <div class="col-12 text-center">
                     <button type="submit" class="btn btn-primary">Actualizar Tipo de Pago</button>
                     <a href="{{ route('tipo-pagos.index') }}" class="btn btn-secondary">Cancelar</a>
                 </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
@endpush



