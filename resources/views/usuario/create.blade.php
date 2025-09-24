@extends('template')

@section('title', 'Crear Usuario')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Crear Usuario</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('usuarios.index') }}">Usuarios</a>
        </li>
        <li class="breadcrumb-item active">Crear Usuario</li>
    </ol>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-user-plus me-1"></i>
            Nuevo Usuario
        </div>
        <div class="card-body">
            <form action="{{ route('usuarios.store') }}" method="POST" id="usuarioForm">
                @csrf
                
                <div class="row g-3">
                    <!-- Campo para seleccionar el tipo de usuario -->
                    <div class="col-12">
                        <label for="tipo_usuario" class="form-label">Tipo de Usuario *</label>
                        <select name="tipo_usuario" id="tipo_usuario" class="form-control @error('tipo_usuario') is-invalid @enderror" required>
                            <option value="">Seleccionar tipo de usuario</option>
                            <option value="administrador" {{ old('tipo_usuario') == 'administrador' ? 'selected' : '' }}>Administrador</option>
                            <option value="barbero" {{ old('tipo_usuario') == 'barbero' ? 'selected' : '' }}>Barbero</option>
                            <option value="cliente" {{ old('tipo_usuario') == 'cliente' ? 'selected' : '' }}>Cliente</option>
                        </select>
                        @error('tipo_usuario')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Campos comunes -->
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre *</label>
                        <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="apellido" class="form-label">Apellido *</label>
                        <input type="text" name="apellido" id="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido') }}" required>
                        @error('apellido')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono *</label>
                        <input type="number" name="telefono" id="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}" required>
                        @error('telefono')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Campos de contraseña solo para administradores y barberos -->
                    <div id="password_fields" class="tipo_fields" style="display: none;">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Contraseña *</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña *</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Campos específicos para Administrador -->
                    <div id="administrador_fields" class="tipo_fields" style="display: none;">
                        <div class="col-md-6">
                            <label for="correo_admin" class="form-label">Correo Electrónico</label>
                            <input type="email" name="correo_admin" id="correo_admin" class="form-control @error('correo_admin') is-invalid @enderror" value="{{ old('correo_admin') }}">
                            @error('correo_admin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Campos específicos para Barbero -->
                    <div id="barbero_fields" class="tipo_fields" style="display: none;">
                        <div class="col-md-6">
                            <label for="disponibilidad" class="form-label">Disponibilidad</label>
                            <select name="disponibilidad" id="disponibilidad" class="form-control @error('disponibilidad') is-invalid @enderror">
                                <option value="">Seleccionar</option>
                                <option value="disponible" {{ old('disponibilidad') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                <option value="ocupado" {{ old('disponibilidad') == 'ocupado' ? 'selected' : '' }}>Ocupado</option>
                            </select>
                            @error('disponibilidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="num_doc" class="form-label">Número de Documento</label>
                            <input type="number" name="num_doc" id="num_doc" class="form-control @error('num_doc') is-invalid @enderror" value="{{ old('num_doc') }}">
                            @error('num_doc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="salario" class="form-label">Salario</label>
                            <input type="number" name="salario" id="salario" class="form-control @error('salario') is-invalid @enderror" value="{{ old('salario') }}">
                            @error('salario')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="edad" class="form-label">Edad</label>
                            <input type="number" name="edad" id="edad" class="form-control @error('edad') is-invalid @enderror" value="{{ old('edad') }}" min="1" max="120">
                            @error('edad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Campos específicos para Cliente -->
                    <div id="cliente_fields" class="tipo_fields" style="display: none;">
                        <div class="col-md-6">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion') }}">
                            @error('direccion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="correo_cliente" class="form-label">Correo Electrónico</label>
                            <input type="email" name="correo_cliente" id="correo_cliente" class="form-control @error('correo_cliente') is-invalid @enderror" value="{{ old('correo_cliente') }}">
                            @error('correo_cliente')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Guardar Usuario
                        </button>
                        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tipoUsuarioSelect = document.getElementById('tipo_usuario');
    const administradorFields = document.getElementById('administrador_fields');
    const barberoFields = document.getElementById('barbero_fields');
    const clienteFields = document.getElementById('cliente_fields');
    const passwordFields = document.getElementById('password_fields');

    function toggleFields() {
        // Ocultar todos los campos específicos
        document.querySelectorAll('.tipo_fields').forEach(field => {
            field.style.display = 'none';
        });

        // Mostrar campos según el tipo seleccionado
        switch(tipoUsuarioSelect.value) {
            case 'administrador':
                administradorFields.style.display = 'block';
                passwordFields.style.display = 'block';
                // Hacer contraseña requerida para administradores
                document.getElementById('password').required = true;
                break;
            case 'barbero':
                barberoFields.style.display = 'block';
                passwordFields.style.display = 'block';
                // Hacer contraseña requerida para barberos
                document.getElementById('password').required = true;
                break;
            case 'cliente':
                clienteFields.style.display = 'block';
                // No mostrar campos de contraseña para clientes
                passwordFields.style.display = 'none';
                // Quitar requerimiento de contraseña para clientes
                document.getElementById('password').required = false;
                break;
        }
    }

    // Event listener para el cambio de tipo
    tipoUsuarioSelect.addEventListener('change', toggleFields);

    // Ejecutar al cargar la página para mantener el estado si hay errores
    toggleFields();
});
</script>
@endpush