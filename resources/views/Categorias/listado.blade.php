<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-center text-gray-100 leading-tight">
            Listado de Categorías
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto bg-gray-800 dark:bg-gray-900 shadow-lg rounded-xl p-6">

            {{-- Botón añadir --}}
            <div class="flex justify-end mb-4">
                <a href="{{ route('form_reg_categoria') }}" 
                   class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded-lg transition">
                    Añadir Categoría
                </a>
            </div>

            {{-- Tabla de categorías --}}
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse border border-gray-700">
                    <thead class="bg-gray-700 text-gray-200">
                        <tr>
                            <th class="px-4 py-2 border border-gray-600 text-left">Id</th>
                            <th class="px-4 py-2 border border-gray-600 text-left">Nombre</th>
                            <th class="px-4 py-2 border border-gray-600 text-left">Descripción</th>
                            <th class="px-4 py-2 border border-gray-600 text-left">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-100">
                        @foreach($categorias as $c)
                        <tr class="even:bg-gray-700 odd:bg-gray-800">
                            <td class="px-4 py-2 border border-gray-600">{{ $c->id }}</td>
                            <td class="px-4 py-2 border border-gray-600">{{ $c->nombreCategoria }}</td>
                            <td class="px-4 py-2 border border-gray-600">{{ $c->descripcion }}</td>
                            <td class="px-4 py-2 border border-gray-600 space-x-2">
                                <a href="{{ route('form_edc_categoria', $c->id) }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg transition text-sm">
                                    Editar
                                </a>
                                <a href="{{ route('elimina_categoria', $c->id) }}" 
                                   class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg transition text-sm">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
