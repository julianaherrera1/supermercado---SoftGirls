<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Cards resumen --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 p-5 shadow rounded-xl">
                    <small class="text-gray-500 dark:text-gray-400 text-sm">Total productos</small>
                    <h3 class="text-3xl font-bold mt-2 text-gray-900 dark:text-gray-100">
                        {{ $totalProductos ?? 0 }}
                    </h3>
                </div>

                <div class="bg-white dark:bg-gray-800 p-5 shadow rounded-xl">
                    <small class="text-gray-500 dark:text-gray-400 text-sm">Total categorías</small>
                    <h3 class="text-3xl font-bold mt-2 text-gray-900 dark:text-gray-100">
                        {{ $totalCategorias ?? 0 }}
                    </h3>
                </div>

                <div class="bg-white dark:bg-gray-800 p-5 shadow rounded-xl">
                    <small class="text-gray-500 dark:text-gray-400 text-sm">Acciones</small>
                    <div class="flex flex-wrap gap-2 mt-3">
                        <a href="{{ route('form_reg_producto') }}" class="bg-green-600 text-white px-3 py-2 rounded-md text-sm hover:bg-green-700">
                            + Añadir producto
                        </a>
                        <a href="{{ route('form_reg_categoria') }}" class="border border-blue-600 text-blue-600 px-3 py-2 rounded-md text-sm hover:bg-blue-50 dark:hover:bg-gray-700">
                            + Añadir categoría
                        </a>
                    </div>
                </div>
            </div>

            {{-- Buscador --}}
            <div class="bg-white dark:bg-gray-800 p-5 shadow rounded-xl">
                <form method="GET" class="flex flex-col md:flex-row gap-3 items-center">
                    <input
                        type="text"
                        name="q"
                        value="{{ $q ?? '' }}"
                        class="form-control w-full md:w-1/2 border-gray-300 dark:bg-gray-700 dark:text-gray-100 rounded-md"
                        placeholder="Buscar producto por nombre..."
                    >
                    <div class="flex gap-2">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                            Buscar
                        </button>
                        <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline text-sm">
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
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Imagen</th>
                                <th class="px-4 py-3">Nombre</th>
                                <th class="px-4 py-3">Cantidad</th>
                                <th class="px-4 py-3">Precio</th>
                                <th class="px-4 py-3">Categoría</th>
                                <th class="px-4 py-3 text-right">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($productos as $p)
                                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-4 py-3">{{ $p->id }}</td>

                                    {{-- Imagen --}}
                                    <td class="px-4 py-3">
                                        @if($p->fotoProducto)
                                            @php
                                                $url = str_starts_with($p->fotoProducto, 'productos/')
                                                    ? asset('storage/'.$p->fotoProducto)
                                                    : asset('storage/productos/'.$p->fotoProducto);
                                            @endphp
                                            <img src="{{ $url }}" alt=""
                                                 class="w-12 h-12 rounded-md object-cover border border-gray-200 dark:border-gray-600">
                                        @else
                                            <div class="w-12 h-12 bg-gray-200 dark:bg-gray-600 rounded-md"></div>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 font-medium">{{ $p->nombreProducto }}</td>
                                    <td class="px-4 py-3">{{ $p->cantidadProducto }}</td>
                                    <td class="px-4 py-3">${{ number_format($p->precioProducto, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3">{{ $p->categoria->nombreCategoria ?? '-' }}</td>

                                    {{-- Acciones --}}
                                    <td class="px-4 py-3 text-right space-x-2">
                                        <a href="{{ route('form_edicion', $p->id) }}" class="bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700 text-xs">Editar</a>
                                        <form action="{{ route('elimina_producto', $p->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700 text-xs"
                                                    onclick="return confirm('¿Eliminar este producto?')">
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
                <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $productos->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
