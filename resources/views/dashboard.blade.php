<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-center text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Cards resumen --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">

                {{-- Total productos --}}
                <div class="bg-white dark:bg-gray-800 p-5 shadow rounded-xl flex flex-col items-center">
                    <small class="text-gray-500 dark:text-gray-400 text-sm">Total productos</small>
                    <h3 class="text-3xl font-bold mt-2 text-gray-900 dark:text-gray-100">
                        {{ $totalProductos ?? 0 }}
                    </h3>
                </div>

                {{-- Total categorías --}}
                <div class="bg-white dark:bg-gray-800 p-5 shadow rounded-xl flex flex-col items-center">
                    <small class="text-gray-500 dark:text-gray-400 text-sm">Total categorías</small>
                    <h3 class="text-3xl font-bold mt-2 text-gray-900 dark:text-gray-100">
                        {{ $totalCategorias ?? 0 }}
                    </h3>
                    <a href="{{ route('categorias') }}" 
                       class="mt-3 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm transition">
                        Ver listado
                    </a>
                </div>

                {{-- Acciones --}}
                <div class="bg-white dark:bg-gray-800 p-5 shadow rounded-xl flex flex-col items-center">
                    <small class="text-gray-500 dark:text-gray-400 text-sm">Acciones</small>
                    <div class="flex flex-wrap justify-center gap-2 mt-3">
                        <a href="{{ route('form_reg_producto') }}" 
                           class="bg-green-600 text-white px-4 py-2 rounded-md text-sm hover:bg-green-700">
                            + Añadir producto
                        </a>
                        <a href="{{ route('form_reg_categoria') }}" 
                           class="border border-blue-600 text-blue-600 px-4 py-2 rounded-md text-sm hover:bg-blue-50 dark:hover:bg-gray-700">
                            + Añadir categoría
                        </a>
                    </div>
                </div>

            </div>

            {{-- Buscador --}}
            <div class="bg-white dark:bg-gray-800 p-5 shadow rounded-xl flex justify-center">
                <form method="GET" class="flex flex-col md:flex-row gap-3 items-center w-full md:w-2/3">
                    <input
                        type="text"
                        name="q"
                        value="{{ $q ?? '' }}"
                        class="form-control w-full md:flex-1 border-gray-300 dark:bg-gray-700 dark:text-gray-100 rounded-md px-3 py-2"
                        placeholder="Buscar producto por nombre..."
                    >
                    <div class="flex gap-2 mt-2 md:mt-0">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                            Buscar
                        </button>
                        <a href="{{ route('dashboard') }}" 
                           class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-100 px-4 py-2 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                            Limpiar
                        </a>
                    </div>
                </form>
            </div>

            {{-- Tabla de productos --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-gray-800 dark:text-gray-100">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-left">
                            <tr>
                                <th class="px-4 py-3 text-center">#</th>
                                <th class="px-4 py-3 text-center">Imagen</th>
                                <th class="px-4 py-3 text-center">Nombre</th>
                                <th class="px-4 py-3 text-center">Cantidad</th>
                                <th class="px-4 py-3 text-center">Precio</th>
                                <th class="px-4 py-3 text-center">Categoría</th>
                                <th class="px-4 py-3 text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($productos as $index => $p)
                                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 align-middle text-center">
                                    {{-- Numeración desde 1 --}}
                                    <td class="px-4 py-3">{{ $index + 1 }}</td>

                                    {{-- Imagen --}}
                                    <td class="px-4 py-4 flex items-center justify-center h-36">
                                        @if($p->fotoProducto)
                                            @php
                                                $url = str_starts_with($p->fotoProducto, 'productos/')
                                                    ? asset('storage/'.$p->fotoProducto)
                                                    : asset('storage/productos/'.$p->fotoProducto);
                                            @endphp
                                            <img src="{{ $url }}" alt=""
                                                 class="w-32 h-32 rounded-md object-cover border border-gray-200 dark:border-gray-600">
                                        @else
                                            <div class="w-32 h-32 bg-gray-200 dark:bg-gray-600 rounded-md"></div>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 font-medium">{{ $p->nombreProducto }}</td>
                                    <td class="px-4 py-3">{{ $p->cantidadProducto }}</td>
                                    <td class="px-4 py-3">${{ number_format($p->precioProducto, 0, ',', '.') }}</td>

                                    {{-- Categoría con manejo seguro --}}
                                    <td class="px-4 py-3">
                                        {{ $p->categoriaRelacion->nombreCategoria ?? 'Sin categoría' }}
                                    </td>



                                    {{-- Acciones --}}
                                    <td class="px-4 py-3 space-x-2 flex justify-center">
                                        <a href="{{ route('form_edicion', $p->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                                            Editar
                                        </a>
                                        <form action="{{ route('elimina_producto', $p->id) }}" method="POST" class="inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-sm"
                                                    onclick="return confirmDelete(event, '{{ $p->nombreProducto }}')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-6 text-gray-500 dark:text-gray-400">
                                        No hay productos registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Paginación --}}
                <div class="p-4 border-t border-gray-200 dark:border-gray-700 text-center">
                    {{ $productos->links() }}
                </div>
            </div>

        </div>
    </div>

    <script>
    function confirmDelete(event, name) {
        event.preventDefault();
        if (confirm(`¿Estás seguro de eliminar "${name}"? Esta acción no se puede deshacer.`)) {
            event.target.closest('form').submit();
        }
    }

    // Mostrar mensaje de éxito si existe
    @if(session('success'))
        alert('{{ session('success') }}');
    @endif
    </script>

</x-app-layout>
