@extends('template')

@section('title','Editar Venta')

@push('css')
@endpush

@section('content')
<div class="container">
    <h1 class="mt-4 px-5">Editar Venta</h1>
    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('ventas.index') }}">Ventas</a>
        </li>
        <li class="breadcrumb-item active">Editar Venta</li>
    </ol>

    <div class="container w-100 border-3 border primary rounded p-4 mt-3">

         <form action="{{ route('ventas.update', ['venta' => $venta]) }}" method="post">
            @csrf
            @method('PATCH')
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="id_clie" class="form-label">Cliente *</label>
                    <select name="id_clie" id="id_clie" class="form-control" required>
                        <option value="">Seleccionar cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id_clie }}" {{ old('id_clie', $venta->id_clie) == $cliente->id_clie ? 'selected' : '' }}>
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
                            <option value="{{ $barbero->id_barbero }}" {{ old('id_barbero', $venta->id_barbero) == $barbero->id_barbero ? 'selected' : '' }}>
                                {{ $barbero->nombre }} {{ $barbero->apellido }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_barbero')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="id_serv" class="form-label">Servicio *</label>
                    <select name="id_serv" id="id_serv" class="form-control" required>
                        <option value="">Seleccionar servicio</option>
                        @foreach($servicios as $servicio)
                            <option value="{{ $servicio->id_serv }}" {{ old('id_serv', $venta->id_serv) == $servicio->id_serv ? 'selected' : '' }}>
                                {{ $servicio->nombre }} - ${{ number_format($servicio->precio, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_serv')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="valor" class="form-label">Valor *</label>
                    <input type="number" name="valor" id="valor" class="form-control" value="{{ old('valor', $venta->valor) }}" required min="0">
                    @error('valor')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ old('cantidad', $venta->cantidad) }}" min="1">
                    @error('cantidad')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="total" class="form-label">Total</label>
                    <input type="number" name="total" id="total" class="form-control" value="{{ old('total', $venta->total) }}" readonly>
                    @error('total')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                 <div class="col-12 text-center">
                     <button type="submit" class="btn btn-primary">Actualizar Venta</button>
                     <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Cancelar</a>
                 </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
<script>
// Calcular total automáticamente
document.getElementById('valor').addEventListener('input', calcularTotal);
document.getElementById('cantidad').addEventListener('input', calcularTotal);

function calcularTotal() {
    const valor = parseFloat(document.getElementById('valor').value) || 0;
    const cantidad = parseInt(document.getElementById('cantidad').value) || 1;
    const total = valor * cantidad;
    document.getElementById('total').value = total;
}
</script>
@endpush

