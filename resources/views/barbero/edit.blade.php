@extends('template')

@section('title', 'Editar Barbero')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Editar Barbero</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('barberos.index') }}">Barberos</a>
        </li>
        <li class="breadcrumb-item active">Editar Barbero</li>
    </ol>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-user-tie me-1"></i>
            Editar Barbero
        </div>
        <div class="card-body">
            <form action="{{ route('barberos.update', $barbero) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre *</label>
                        <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $barbero->nombre) }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="apellido" class="form-label">Apellido *</label>
                        <input type="text" name="apellido" id="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido', $barbero->apellido) }}" required>
                        @error('apellido')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono *</label>
                        <input type="number" name="telefono" id="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $barbero->telefono) }}" required>
                        @error('telefono')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="disponibilidad" class="form-label">Disponibilidad</label>
                        <select name="disponibilidad" id="disponibilidad" class="form-control @error('disponibilidad') is-invalid @enderror">
                            <option value="">Seleccionar</option>
                            <option value="disponible" {{ old('disponibilidad', $barbero->disponibilidad) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                            <option value="ocupado" {{ old('disponibilidad', $barbero->disponibilidad) == 'ocupado' ? 'selected' : '' }}>Ocupado</option>
                        </select>
                        @error('disponibilidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="num_doc" class="form-label">Número de Documento</label>
                        <input type="number" name="num_doc" id="num_doc" class="form-control @error('num_doc') is-invalid @enderror" value="{{ old('num_doc', $barbero->num_doc) }}">
                        @error('num_doc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="salario" class="form-label">Salario</label>
                        <input type="number" name="salario" id="salario" class="form-control @error('salario') is-invalid @enderror" value="{{ old('salario', $barbero->salario) }}">
                        @error('salario')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" name="edad" id="edad" class="form-control @error('edad') is-invalid @enderror" value="{{ old('edad', $barbero->edad) }}" min="1" max="120">
                        @error('edad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Actualizar Barbero
                        </button>
                        <a href="{{ route('barberos.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


