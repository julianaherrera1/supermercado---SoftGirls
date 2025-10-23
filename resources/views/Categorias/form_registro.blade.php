<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-center text-gray-100 leading-tight">
            Registro de Categorías
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto bg-gray-800 dark:bg-gray-900 shadow-lg rounded-xl p-6">

            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="bg-green-600 text-white p-4 rounded mb-4 flex items-center justify-between">
                    <span>{{ session('success') }}</span>
                    <a href="{{ route('categorias') }}" 
                       class="bg-green-800 hover:bg-green-700 px-3 py-1 rounded text-sm transition">
                        Volver a lista
                    </a>
                </div>
            @endif

            {{-- Mostrar errores generales --}}
            @if ($errors->any())
                <div class="bg-red-600 text-white p-4 rounded mb-4">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/categorias/registro') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Nombre Categoría --}}
                <div>
                    <label for="nombre_categoria" class="block text-gray-200 font-medium mb-1">Nombre de la Categoría</label>
                    <input type="text" 
                           id="nombre_categoria" 
                           name="nombre_categoria" 
                           value="{{ old('nombre_categoria') }}"
                           class="w-full px-4 py-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-400 focus:ring-opacity-50 @error('nombre_categoria') border-red-500 @enderror">
                    @error('nombre_categoria')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Descripción Categoría --}}
                <div>
                    <label for="descripcion_categoria" class="block text-gray-200 font-medium mb-1">Descripción</label>
                    <input type="text" 
                           id="descripcion_categoria" 
                           name="descripcion_categoria" 
                           value="{{ old('descripcion_categoria') }}"
                           class="w-full px-4 py-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-400 focus:ring-opacity-50 @error('descripcion_categoria') border-red-500 @enderror">
                    @error('descripcion_categoria')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Botón de Enviar --}}
                <div class="flex justify-between items-center">
                    <a href="{{ route('categorias') }}" 
                       class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-4 py-2 rounded-lg transition">
                        Volver a Lista
                    </a>
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition">
                        Registrar Categoría
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
