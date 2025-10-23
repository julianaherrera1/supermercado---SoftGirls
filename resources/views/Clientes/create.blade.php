<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-center text-gray-100 leading-tight">
            Registro de Clientes
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto bg-gray-800 dark:bg-gray-900 shadow-lg rounded-xl p-6">

            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="bg-green-600 text-white p-4 rounded mb-4 flex items-center justify-between">
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            {{-- Errores generales --}}
            @if ($errors->any())
                <div class="bg-red-600 text-white p-4 rounded mb-4">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulario --}}
            <form action="{{ url('/clientes/registro') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                {{-- Nombre --}}
                <div>
                    <label for="nombre" class="block text-gray-200 font-medium mb-1">Nombre Completo</label>
                    <input type="text" 
                           id="nombre" 
                           name="nombre" 
                           value="{{ old('nombre') }}"
                           class="w-full px-4 py-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 
                                  focus:border-blue-500 focus:ring focus:ring-blue-400 focus:ring-opacity-50 
                                  @error('nombre') border-red-500 @enderror"
                           placeholder="Ej: Juan Pérez">
                    @error('nombre')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Cédula --}}
                <div>
                    <label for="cedula" class="block text-gray-200 font-medium mb-1">Cédula</label>
                    <input type="text" 
                           id="cedula" 
                           name="cedula" 
                           value="{{ old('cedula') }}"
                           class="w-full px-4 py-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 
                                  focus:border-blue-500 focus:ring focus:ring-blue-400 focus:ring-opacity-50 
                                  @error('cedula') border-red-500 @enderror"
                           placeholder="Ej: 1234567890">
                    @error('cedula')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Dirección --}}
                <div>
                    <label for="direccion" class="block text-gray-200 font-medium mb-1">Dirección</label>
                    <input type="text" 
                           id="direccion" 
                           name="direccion" 
                           value="{{ old('direccion') }}"
                           class="w-full px-4 py-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 
                                  focus:border-blue-500 focus:ring focus:ring-blue-400 focus:ring-opacity-50 
                                  @error('direccion') border-red-500 @enderror"
                           placeholder="Ej: Calle 45 # 23 - 67">
                    @error('direccion')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Teléfono --}}
                <div>
                    <label for="telefono" class="block text-gray-200 font-medium mb-1">Teléfono</label>
                    <input type="text" 
                           id="telefono" 
                           name="telefono" 
                           value="{{ old('telefono') }}"
                           class="w-full px-4 py-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 
                                  focus:border-blue-500 focus:ring focus:ring-blue-400 focus:ring-opacity-50 
                                  @error('telefono') border-red-500 @enderror"
                           placeholder="Ej: 3001234567">
                    @error('telefono')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Género --}}
                <div>
                    <label for="genero" class="block text-gray-200 font-medium mb-1">Género</label>
                    <select id="genero" 
                            name="genero"
                            class="w-full px-4 py-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 
                                   focus:border-blue-500 focus:ring focus:ring-blue-400 focus:ring-opacity-50 
                                   @error('genero') border-red-500 @enderror">
                        <option disabled selected>Seleccione el género</option>
                        <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                        <option value="Otro" {{ old('genero') == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                    @error('genero')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Foto --}}
                <div>
                    <label for="foto" class="block text-gray-200 font-medium mb-1">Foto del Cliente</label>
                    <input type="file" 
                           id="foto" 
                           name="foto"
                           class="w-full text-gray-100 border border-gray-600 rounded-lg bg-gray-700 px-3 py-2 
                                  @error('foto') border-red-500 @enderror">
                    @error('foto')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Botones --}}
                <div class="flex justify-between items-center pt-4">
                    <a href="{{ route('clientes') }}" 
                       class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-4 py-2 rounded-lg transition">
                        Volver a Lista
                    </a>
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition">
                        Registrar Cliente
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
