<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">Listado de Clientes</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-xl p-4">
                <div class="mb-4 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-100">Clientes</h3>
                    <a href="{{ route('clientes.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Nuevo Cliente</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-gray-200">
                        <thead class="bg-gray-700">
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Foto</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Cédula</th>
                                <th class="px-4 py-2">Teléfono</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clientes as $c)
                                <tr class="border-b border-gray-700">
                                    <td class="px-4 py-3">{{ $c->id }}</td>
                                    <td class="px-4 py-3">
                                        @if($c->fotoCliente)
                                            <img src="{{ asset('storage/'.$c->fotoCliente) }}" alt="" class="w-16 h-16 rounded object-cover">
                                        @else
                                            <div class="w-16 h-16 bg-gray-600 rounded"></div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">{{ $c->nombreCliente }}</td>
                                    <td class="px-4 py-3">{{ $c->cedulaCliente }}</td>
                                    <td class="px-4 py-3">{{ $c->telefonoCliente }}</td>
                                    <td class="px-4 py-3">
                                        <a href="{{ route('clientes.edit', $c->id) }}" class="text-blue-400 mr-2">Editar</a>
                                        <form action="{{ route('clientes.destroy', $c->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Eliminar cliente?')" class="text-red-400">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-6 text-gray-400">No hay clientes registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
