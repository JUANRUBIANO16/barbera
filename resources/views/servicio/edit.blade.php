@extends('template')

@section('title','Editar Servicio')

@push('css')
@endpush

@section('content')
<div class="container">
    <h1 class="mt-4 px-5">Editar Servicio</h1>
    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('servicios.index') }}">Servicios</a>
        </li>
        <li class="breadcrumb-item active">Editar Servicio</li>
    </ol>

    <div class="container w-100 border-3 border primary rounded p-4 mt-3">

         <form action="{{ route('servicios.update', ['servicio' => $servicio]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre del Servicio *</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $servicio->nombre) }}" required>
                    @error('nombre')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="precio" class="form-label">Precio *</label>
                    <input type="number" name="precio" id="precio" class="form-control" value="{{ old('precio', $servicio->precio) }}" required min="0">
                    @error('precio')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="descripcion" class="form-label">Descripción *</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required>{{ old('descripcion', $servicio->descripcion) }}</textarea>
                    @error('descripcion')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="imagen" class="form-label">Imagen del Servicio</label>
                    @if($servicio->imagen)
                        <div class="mb-2">
                            <img src="{{ asset($servicio->imagen) }}" alt="Imagen actual" class="img-thumbnail" style="max-width: 200px;">
                            <p class="text-muted small">Imagen actual</p>
                        </div>
                    @endif
                    <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                    <small class="form-text text-muted">Formatos permitidos: JPEG, PNG, JPG, GIF. Tamaño máximo: 2MB</small>
                    @error('imagen')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                 <div class="col-12 text-center">
                     <button type="submit" class="btn btn-primary">Actualizar Servicio</button>
                     <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Cancelar</a>
                 </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
@endpush
