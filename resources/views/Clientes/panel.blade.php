<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-center text-gray-100 leading-tight">
            {{ __('Clientes & Facturación') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <!-- 📊 Panel resumen -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Clientes -->
                <div class="p-6 bg-gray-800 rounded-2xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1 text-center">
                    <h3 class="text-gray-400 text-sm font-medium">Clientes Registrados</h3>
                    <p class="text-4xl font-extrabold text-indigo-400 mt-2">{{ $totalClientes }}</p>
                    <p class="text-sm text-gray-500 mt-1">Activos en la base de datos</p>
                </div>

                <!-- Facturas -->
                <div class="p-6 bg-gray-800 rounded-2xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1 text-center">
                    <h3 class="text-gray-400 text-sm font-medium">Facturas Emitidas</h3>
                    <p class="text-4xl font-extrabold text-teal-400 mt-2">{{ $totalFacturas }}</p>
                    <p class="text-sm text-gray-500 mt-1">Total histórico</p>
                </div>

                <!-- Ingresos -->
                <div class="p-6 bg-gray-800 rounded-2xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1 text-center">
                    <h3 class="text-gray-400 text-sm font-medium">Ingresos del Mes</h3>
                    <p class="text-4xl font-extrabold text-emerald-400 mt-2">${{ number_format($ingresosMes, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-500 mt-1">Suma total del mes actual</p>
                </div>
            </div>

            <!-- ⚡ Accesos rápidos -->
            <div class="bg-gray-800 p-10 rounded-2xl shadow-md border border-gray-700">
                <h3 class="text-xl font-semibold text-gray-100 text-center mb-10">Accesos Rápidos</h3>

                <!-- Centramos los botones -->
                <div class="flex flex-wrap justify-center gap-8">
                    <!-- Ver Clientes -->
                    <a href="{{ route('clientes') }}" 
                       class="group w-56 h-48 flex flex-col items-center justify-center p-6 bg-indigo-900/40 text-indigo-300 rounded-2xl hover:bg-indigo-800 transition transform hover:-translate-y-1 hover:scale-105 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-3 group-hover:scale-110 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6 3.87v-1a4 4 0 00-3-3.87M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="font-medium text-base">Ver Clientes</span>
                    </a>

                    <!-- Ver Facturas -->
                    <a href="{{ route('facturas.index') }}" 
                       class="group w-56 h-48 flex flex-col items-center justify-center p-6 bg-teal-900/40 text-teal-300 rounded-2xl hover:bg-teal-800 transition transform hover:-translate-y-1 hover:scale-105 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-3 group-hover:scale-110 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 17V7h13v10M3 17h6m0 0v-4m0 4h6" />
                        </svg>
                        <span class="font-medium text-base">Ver Facturas</span>
                    </a>

                    <!-- Nueva Factura -->
                    <a href="{{ route('facturas.create') }}" 
                       class="group w-56 h-48 flex flex-col items-center justify-center p-6 bg-amber-900/40 text-amber-300 rounded-2xl hover:bg-amber-800 transition transform hover:-translate-y-1 hover:scale-105 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-3 group-hover:scale-110 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="font-medium text-base">Nueva Factura</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
