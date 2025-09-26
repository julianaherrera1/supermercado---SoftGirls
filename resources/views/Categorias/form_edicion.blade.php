@extends('..formato')
@yield('contenido')

<div class="container">
    <h1>Actualización de Categorias </h1>
    <form action="{{url('')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre_categoria" class="form-label">Nombre Categoria</label>
            <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" value="{{$category->nombreCategoria}}">
        </div>
        <div class="mb-3">
            <label for="descripcion_categoria" class="form-label">Descripción categoria</label>
            <input type="text" class="form-control" id="descripcion_categoria" name="descripcion_categoria" value="{{$category->descripcion}}">
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
    



