@extends('..formato')

@section('contenido')
<div class="container py-6">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-white">Clientes</h3>
        <a href="{{ route('clientes.create') }}" class="btn btn-success">+ Añadir cliente</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card bg-dark border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Cédula</th>
                            <th>Teléfono</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td style="width:80px;">
                                    @if($c->fotoCliente)
                                        <img src="{{ asset('storage/'.$c->fotoCliente) }}" style="width:60px;height:60px;object-fit:cover;border-radius:6px;">
                                    @else
                                        <div style="width:60px;height:60px;background:#111;border-radius:6px;"></div>
                                    @endif
                                </td>
                                <td>{{ $c->nombreCliente }}</td>
                                <td>{{ $c->cedulaCliente }}</td>
                                <td>{{ $c->telefonoCliente }}</td>
                                <td class="text-end">
                                    <a href="{{ route('clientes.edit', $c->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                    <form action="{{ route('clientes.destroy', $c->id) }}" method="POST" class="d-inline-block">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Eliminar cliente?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

