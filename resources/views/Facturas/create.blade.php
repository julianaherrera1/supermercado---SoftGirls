<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-center text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Registrar Factura') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-8">

                <form action="{{ route('facturas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- Cliente --}}
                    <div>
                        <label for="cliente_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Cliente
                        </label>
                        <select name="cliente_id" id="cliente_id"
                                class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Seleccione un cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nombreCliente }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Fecha --}}
                    <div>
                        <label for="fecha" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Fecha de la Factura
                        </label>
                        <input type="date" id="fecha" name="fecha"
                               class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    {{-- Total --}}
                    <div>
                        <label for="total" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Total
                        </label>
                        <input type="number" step="0.01" id="total" name="total" placeholder="Ingrese el total de la factura"
                               class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    {{-- Botones --}}
                    <div class="flex justify-end gap-4 mt-6">
                        <a href="{{ route('facturas.index') }}"
                           class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg shadow transition">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition">
                            Guardar Factura
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
