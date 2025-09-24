@extends('template')

@section('title', 'Crear Cita')

@push('css')
<style>
    #observaciones{
        resize: none;  
    }
</style>
@endpush

@section('content')

<h1 class="mt-4 px-5">Crear Cita</h1>
<ol class="breadcrumb mb-4 px-5">
    <li class="breadcrumb-item">
        <a href="{{ route('panel') }}">Inicio</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('citas.index') }}">Citas</a>
    </li>
    <li class="breadcrumb-item active">Crear Cita</li>
</ol>

<div class="container w-100 border-3 border primary rounded p-4 mt-3">

<form action="{{route('citas.store')}}" method="post">
    @csrf
<div class="row g-3">
        <div class="col-md-6">
            <label for="id_clie" class="form-label">Cliente *</label>
            <select name="id_clie" id="id_clie" class="form-control" required>
                <option value="">Seleccionar cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_clie }}" {{ old('id_clie') == $cliente->id_clie ? 'selected' : '' }}>
                        {{ $cliente->nombre }} {{ $cliente->apellido }}
                    </option>
                @endforeach
            </select>
        @error('id_clie')
       <small class="text-danger">{{'*'.$message}}</small>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="id_barbero" class="form-label">Barbero *</label>
            <select name="id_barbero" id="id_barbero" class="form-control" required>
                <option value="">Seleccionar barbero</option>
                @foreach($barberos as $barbero)
                    <option value="{{ $barbero->id_barbero }}" {{ old('id_barbero') == $barbero->id_barbero ? 'selected' : '' }}>
                        {{ $barbero->nombre }} {{ $barbero->apellido }}
                    </option>
                @endforeach
            </select>
        @error('id_barbero')
       <small class="text-danger">{{'*'.$message}}</small>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="fecha" class="form-label">Fecha *</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{old('fecha')}}" required>
        @error('fecha')
       <small class="text-danger">{{'*'.$message}}</small>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="hora" class="form-label">Hora *</label>
            <input type="time" name="hora" id="hora" class="form-control" value="{{old('hora')}}" required>
        @error('hora')
       <small class="text-danger">{{'*'.$message}}</small>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control">
                <option value="">Seleccionar estado</option>
                <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="confirmada" {{ old('estado') == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                <option value="completada" {{ old('estado') == 'completada' ? 'selected' : '' }}>Completada</option>
                <option value="cancelada" {{ old('estado') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
        @error('estado')
       <small class="text-danger">{{'*'.$message}}</small>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion')}}" placeholder="Descripción de la cita...">
        @error('descripcion')
       <small class="text-danger">{{'*'.$message}}</small>
        @enderror
        </div>

          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Guardar Cita</button>
          </div>   
    
    </div>
</form>

</div>

@endsection

@push('js')
{{-- Aquí tu JS extra si necesitas --}}
@endpush
