@extends('..formato')
@yield('contenido')

<div class="container">
    <h1>Registro de Productos</h1>

    {{-- Mostrar errores generales --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/productos/registro') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nombre Producto --}}
        <div class="mb-3">
            <label for="nombre_producto" class="form-label">Nombre Producto</label>
            <input type="text" 
                   class="form-control @error('nombre_producto') is-invalid @enderror" 
                   id="nombre_producto" 
                   name="nombre_producto" 
                   value="{{ old('nombre_producto') }}">
            @error('nombre_producto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Cantidad --}}
        <div class="mb-3">
            <label for="cantidad_producto" class="form-label">Cantidad</label>
            <input type="number" 
                   class="form-control @error('cantidad_producto') is-invalid @enderror" 
                   id="cantidad_producto" 
                   name="cantidad_producto" 
                   value="{{ old('cantidad_producto') }}">
            @error('cantidad_producto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Precio --}}
        <div class="mb-3">
            <label for="precio_producto" class="form-label">Precio</label>
            <input type="number" 
                   class="form-control @error('precio_producto') is-invalid @enderror" 
                   id="precio_producto" 
                   name="precio_producto" 
                   step="0.01"
                   value="{{ old('precio_producto') }}">
            @error('precio_producto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Foto --}}
        <div class="mb-3">
            <label for="foto_producto" class="form-label">Foto</label>
            <input type="file" 
                   class="form-control @error('foto_producto') is-invalid @enderror" 
                   id="foto_producto" 
                   name="foto_producto">
            @error('foto_producto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Categoría --}}
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select class="form-select @error('categoria') is-invalid @enderror" 
                    id="categoria" 
                    name="categoria">
                <option disabled selected>Seleccione una categoria</option>
                @foreach($categorias as $c)
                    <option value="{{ $c->id }}" {{ old('categoria') == $c->id ? 'selected' : '' }}>
                        {{ $c->nombreCategoria }}
                    </option>
                @endforeach
            </select>
            @error('categoria')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Botón de Enviar --}}
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>