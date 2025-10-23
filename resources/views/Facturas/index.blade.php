<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-center text-gray-100 leading-tight">
            {{ __('Listado de Facturas') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">

            <!-- 🧾 Mensaje de éxito -->
            @if(session('success'))
                <div class="bg-green-600 text-white p-4 rounded mb-4 flex items-center justify-between">
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- 📋 Tabla de facturas -->
            <div class="bg-gray-800 shadow-lg rounded-xl p-6 border border-gray-700">
                <h3 class="text-lg font-semibold text-gray-100 mb-4">Facturas Registradas</h3>

                @if($facturas->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead>
                                <tr class="bg-gray-700 text-gray-200 uppercase text-sm">
                                    <th class="px-4 py-3 text-left">#</th>
                                    <th class="px-4 py-3 text-left">Cliente</th>
                                    <th class="px-4 py-3 text-left">Fecha</th>
                                    <th class="px-4 py-3 text-left">Total</th>
                                    <th class="px-4 py-3 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach ($facturas as $factura)
                                    <tr class="hover:bg-gray-700/30 transition">
                                        <td class="px-4 py-3 text-gray-300">{{ $factura->id }}</td>
                                        <td class="px-4 py-3 text-gray-300">{{ $factura->cliente->nombre ?? 'Sin cliente' }}</td>
                                        <td class="px-4 py-3 text-gray-300">{{ $factura->created_at->format('d/m/Y') }}</td>
                                        <td class="px-4 py-3 text-gray-300">
                                            ${{ number_format($factura->total, 0, ',', '.') }}
                                        </td>
                                        <td class="px-4 py-3 flex justify-center space-x-3">
                                            <a href="{{ route('facturas.show', $factura->id) }}" 
                                               class="text-blue-400 hover:text-blue-300 transition">Ver</a>

                                            <a href="{{ route('facturas.edit', $factura->id) }}" 
                                               class="text-yellow-400 hover:text-yellow-300 transition">Editar</a> 
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $facturas->links() }}
                    </div>
                @else
                    <p class="text-gray-400 text-center">No hay facturas registradas aún.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
