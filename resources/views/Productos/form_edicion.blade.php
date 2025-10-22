@extends('..formato')

@section('titulo', 'Editar producto')

@section('estilos')
<style>
    body {
        background-color: #0f172a;
        color: #e2e8f0;
    }

    .card {
        background-color: #1e293b;
        border: 1px solid #334155;
        border-radius: 12px;
        color: #f1f5f9;
    }

    .card-header {
        background: linear-gradient(90deg, #2563eb, #1d4ed8);
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .form-label {
        color: #cbd5e1;
        font-weight: 600;
    }

    .form-control, .form-select {
        background-color: #0f172a;
        border: 1px solid #334155;
        color: #f8fafc;
        border-radius: 8px;
    }

    .form-control:focus, .form-select:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 0.2rem rgba(59,130,246,0.25);
        background-color: #1e293b;
        color: #fff;
    }

    .btn-primary {
        background-color: #2563eb;
        border: none;
        border-radius: 8px;
        font-weight: 500;
    }

    .btn-primary:hover {
        background-color: #1d4ed8;
    }

    .btn-light {
        color: #1e293b;
        font-weight: 600;
        border-radius: 8px;
    }

    .bg-light {
        background-color: #1e293b !important;
        border: 1px dashed #475569;
    }

    .text-muted {
        color: #94a3b8 !important;
    }

    .img-fluid {
        border: 2px solid #334155;
    }

    .shadow-lg {
        box-shadow: 0 10px 25px rgba(0,0,0,0.5) !important;
    }
</style>
@endsection


@section('contenido')
<div class="container py-5">

    <div class="card shadow-lg border-0">
        <div class="card-header text-white d-flex justify-content-between align-items-center px-4 py-3">
            <h5 class="mb-0 fw-semibold">✏️ Editar producto</h5>
            <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">← Volver</a>
        </div>

        <div class="card-body px-4 py-4">
            <form action="{{ route('actualiza_producto', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf


                <div class="row g-4">

                    {{-- Nombre --}}
                    <div class="col-md-6">
                        <label for="nombre_producto" class="form-label">Nombre del producto</label>
                        <input type="text" name="nombre_producto" id="nombre_producto"
                            class="form-control @error('nombre_producto') is-invalid @enderror"
                            value="{{ old('nombre_producto', $producto->nombreProducto) }}">
                        @error('nombre_producto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Cantidad --}}
                    <div class="col-md-3">
                        <label for="cantidad_producto" class="form-label">Cantidad</label>
                        <input type="number" name="cantidad_producto" id="cantidad_producto"
                            class="form-control @error('cantidad_producto') is-invalid @enderror"
                            value="{{ old('cantidad_producto', $producto->cantidadProducto) }}">
                        @error('cantidad_producto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Precio --}}
                    <div class="col-md-3">
                        <label for="precio_producto" class="form-label">Precio</label>
                        <input type="number" step="0.01" name="precio_producto" id="precio_producto"
                            class="form-control @error('precio_producto') is-invalid @enderror"
                            value="{{ old('precio_producto', $producto->precioProducto) }}">
                        @error('precio_producto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Categoría --}}
                    <div class="col-md-6">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select name="categoria" id="categoria" class="form-select @error('categoria') is-invalid @enderror">
                            <option value="">Seleccione una categoría</option>
                            @foreach($categorias as $c)
                                <option value="{{ $c->id }}" 
                                    {{ $c->id == old('categoria', $producto->categoria) ? 'selected' : '' }}>
                                    {{ $c->nombreCategoria }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Imagen actual --}}
                    <div class="col-md-6 text-center">
                        <label class="form-label">Imagen actual</label>
                        <div class="border rounded p-2 d-flex justify-content-center bg-light" style="height: 180px;">
                            @if($producto->fotoProducto)
                                @php
                                    $url = str_starts_with($producto->fotoProducto, 'productos/')
                                        ? asset('storage/'.$producto->fotoProducto)
                                        : asset('storage/productos/'.$producto->fotoProducto);
                                @endphp
                                <img src="{{ $url }}" id="previewActual"
                                    alt="Imagen actual" class="img-fluid rounded"
                                    style="max-height: 160px; object-fit: cover;">
                            @else
                                <p class="text-muted my-auto">Sin imagen</p>
                            @endif
                        </div>
                    </div>

                    {{-- Subir nueva imagen --}}
                    <div class="col-md-6">
                        <label for="foto_producto" class="form-label">Cambiar imagen</label>
                        <input type="file" name="foto_producto" id="foto_producto"
                            class="form-control @error('foto_producto') is-invalid @enderror" accept="image/*"
                            onchange="previewNuevaImagen(event)">
                        @error('foto_producto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="mt-3 text-center" id="previewNuevaContainer" style="display: none;">
                            <p class="text-muted mb-1 small">Vista previa nueva imagen:</p>
                            <img id="previewNueva" class="img-fluid rounded"
                                style="max-height: 160px; object-fit: cover;">
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary px-4 py-2">💾 Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewNuevaImagen(event) {
    const file = event.target.files[0];
    const previewContainer = document.getElementById('previewNuevaContainer');
    const previewImage = document.getElementById('previewNueva');
    if (file) {
        previewContainer.style.display = 'block';
        previewImage.src = URL.createObjectURL(file);
    } else {
        previewContainer.style.display = 'none';
        previewImage.src = '';
    }
}
</script>
