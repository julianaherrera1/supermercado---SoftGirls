@extends('layouts.app')

@section('content')
    <h1>Editar producto</h1>

    <form action="{{ route('actualizar_producto', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="nombreProducto" value="{{ $producto->nombreProducto }}">

        <label>Precio:</label>
        <input type="number" name="precioProducto" value="{{ $producto->precioProducto }}">

        <button type="submit">Actualizar</button>
    </form>
@endsection
