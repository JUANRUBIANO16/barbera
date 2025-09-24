@extends('template')

@section('title','Editar Disponibilidad')

@push('css')
@endpush

@section('content')
<div class="container">
    <h1 class="mt-4 px-5">Editar Disponibilidad</h1>
    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('disponibilidades.index') }}">Disponibilidad</a>
        </li>
        <li class="breadcrumb-item active">Editar Disponibilidad</li>
    </ol>

    <div class="container w-100 border-3 border primary rounded p-4 mt-3">

         <form action="{{ route('disponibilidades.update', ['disponibilidad' => $disponibilidad]) }}" method="post">
            @csrf
            @method('PATCH')
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="id_barbero" class="form-label">Barbero *</label>
                    <select name="id_barbero" id="id_barbero" class="form-control" required>
                        <option value="">Seleccionar barbero</option>
                        @foreach($barberos as $barbero)
                            <option value="{{ $barbero->id_barbero }}" {{ old('id_barbero', $disponibilidad->id_barbero) == $barbero->id_barbero ? 'selected' : '' }}>
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
                    <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha', $disponibilidad->fecha) }}" required>
                    @error('fecha')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="hora_de_inicio" class="form-label">Hora de Inicio *</label>
                    <input type="time" name="hora_de_inicio" id="hora_de_inicio" class="form-control" value="{{ old('hora_de_inicio', $disponibilidad->hora_de_inicio) }}" required>
                    @error('hora_de_inicio')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="hora_final" class="form-label">Hora Final *</label>
                    <input type="time" name="hora_final" id="hora_final" class="form-control" value="{{ old('hora_final', $disponibilidad->hora_final) }}" required>
                    @error('hora_final')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                 <div class="col-12 text-center">
                     <button type="submit" class="btn btn-primary">Actualizar Disponibilidad</button>
                     <a href="{{ route('disponibilidades.index') }}" class="btn btn-secondary">Cancelar</a>
                 </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
@endpush



