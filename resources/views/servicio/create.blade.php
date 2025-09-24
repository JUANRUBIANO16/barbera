@extends('template')

@section('title', 'Crear Servicio')

@section('content')
<h1 class="mt-4 px-5">Crear Servicio</h1>
<ol class="breadcrumb mb-4 px-5">
    <li class="breadcrumb-item">
        <a href="{{ route('panel') }}">Inicio</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('servicios.index') }}">Servicios</a>
    </li>
    <li class="breadcrumb-item active">Crear Servicio</li>
</ol>

<div class="container w-100 border-3 border primary rounded p-4 mt-3">

<form action="{{route('servicios.store')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="row g-3">
    <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre del Servicio *</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}" required>
    @error('nombre')
   <small class="text-danger">{{'*'.$message}}</small>
    @enderror
    </div>

    <div class="col-md-6">
        <label for="precio" class="form-label">Precio *</label>
        <input type="number" name="precio" id="precio" class="form-control" value="{{old('precio')}}" required min="0">
    @error('precio')
   <small class="text-danger">{{'*'.$message}}</small>
    @enderror
    </div>

    <div class="col-md-12">
        <label for="descripcion" class="form-label">Descripción *</label>
        <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required>{{old('descripcion')}}</textarea>
    @error('descripcion')
   <small class="text-danger">{{'*'.$message}}</small>
    @enderror
    </div>

    <div class="col-md-12">
        <label for="imagen" class="form-label">Imagen del Servicio</label>
        <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
        <small class="form-text text-muted">Formatos permitidos: JPEG, PNG, JPG, GIF. Tamaño máximo: 2MB</small>
    @error('imagen')
   <small class="text-danger">{{'*'.$message}}</small>
    @enderror
    </div>

      <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Guardar Servicio</button>
        <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Cancelar</a>
      </div>   
    
    </div>
</form>

</div>

@endsection

@push('js')
{{-- Aquí tu JS extra si necesitas --}}
@endpush
