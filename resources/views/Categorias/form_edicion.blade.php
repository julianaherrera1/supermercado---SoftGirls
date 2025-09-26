@extends('..format')

@yield('contenido')

<div class="container">

    <h1>Actualización de Categorias</h1>

    <form action="{{ url('')}}" method="POST">
        @csrf <!-- medida de seguridad para proteger los datos que viajen por el formulario -->
        <div class="form-group">
            <label for="nombre_categoria">Nombre Categoria</label>
            <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria"> <!-- id estilos name como se llama el campo (utilizar lo que esta dentro) -->
        </div>
        <div class="form-group">
            <label for="descripcion_categoria">Descripcion Categoria</label>
            <input type="text" class="form-control" id="descripcion_categoria" name="descripcion_categoria">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>