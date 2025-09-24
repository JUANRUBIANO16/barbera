@extends('template')

@section('title', 'Crear Persona')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Crear Persona</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('personas.index') }}">Personas</a>
        </li>
        <li class="breadcrumb-item active">Crear Persona</li>
    </ol>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-users me-1"></i>
            Nueva Persona
        </div>
        <div class="card-body">
            <form action="{{ route('personas.store') }}" method="POST">
                @csrf
                
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="id_admin" class="form-label">ID Administrador</label>
                        <select name="id_admin" id="id_admin" class="form-control @error('id_admin') is-invalid @enderror">
                            <option value="">Seleccionar Administrador</option>
                            @foreach($administradores as $admin)
                                <option value="{{ $admin->id_admin }}" {{ old('id_admin') == $admin->id_admin ? 'selected' : '' }}>
                                    {{ $admin->nombre }} {{ $admin->apellido }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_admin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="id_barbero" class="form-label">ID Barbero</label>
                        <select name="id_barbero" id="id_barbero" class="form-control @error('id_barbero') is-invalid @enderror">
                            <option value="">Seleccionar Barbero</option>
                            @foreach($barberos as $barbero)
                                <option value="{{ $barbero->id_barbero }}" {{ old('id_barbero') == $barbero->id_barbero ? 'selected' : '' }}>
                                    {{ $barbero->nombre }} {{ $barbero->apellido }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_barbero')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="id_clie" class="form-label">ID Cliente</label>
                        <select name="id_clie" id="id_clie" class="form-control @error('id_clie') is-invalid @enderror">
                            <option value="">Seleccionar Cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id_clie }}" {{ old('id_clie') == $cliente->id_clie ? 'selected' : '' }}>
                                    {{ $cliente->nombre }} {{ $cliente->apellido }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_clie')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Guardar Persona
                        </button>
                        <a href="{{ route('personas.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



