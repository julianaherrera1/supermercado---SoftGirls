@extends('..formato')
@yield('contenido')

<div class="container">
    <h1>Registro de Categorias </h1>
    <form>
        @csrf
        <div class="mb-3">
            <label for="nombre_categoria" class="form-label">Nombre Categoria</label>
            <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria">
        </div>
        <div class="mb-3">
            <label for="descripcion_categoria" class="form-label">Descripción categoria</label>
            <input type="text" class="form-control" id="descripcion_categoria" name="descripcion_categoria">
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

</div>
    



