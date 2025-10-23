<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-center text-gray-100 leading-tight">
            Registro de Productos
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

            <form action="{{ url('/productos/registro') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                {{-- Nombre Producto --}}
                <div>
                    <label for="nombre_producto" class="block text-gray-200 font-medium mb-1">Nombre del Producto</label>
                    <input type="text" 
                           id="nombre_producto" 
                           name="nombre_producto" 
                           value="{{ old('nombre_producto') }}"
                           class="w-full px-4 py-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-400 focus:ring-opacity-50 @error('nombre_producto') border-red-500 @enderror">
                    @error('nombre_producto')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Cantidad --}}
                <div>
                    <label for="cantidad_producto" class="block text-gray-200 font-medium mb-1">Cantidad</label>
                    <input type="number" 
                           id="cantidad_producto" 
                           name="cantidad_producto" 
                           value="{{ old('cantidad_producto') }}"
                           class="w-full px-4 py-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-400 focus:ring-opacity-50 @error('cantidad_producto') border-red-500 @enderror">
                    @error('cantidad_producto')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Precio --}}
                <div>
                    <label for="precio_producto" class="block text-gray-200 font-medium mb-1">Precio</label>
                    <input type="number" 
                           id="precio_producto" 
                           name="precio_producto" 
                           step="0.01"
                           value="{{ old('precio_producto') }}"
                           class="w-full px-4 py-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-400 focus:ring-opacity-50 @error('precio_producto') border-red-500 @enderror">
                    @error('precio_producto')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Foto --}}
                <div>
                    <label for="foto_producto" class="block text-gray-200 font-medium mb-1">Foto del Producto</label>
                    <input type="file" 
                           id="foto_producto" 
                           name="foto_producto"
                           class="w-full text-gray-100 border border-gray-600 rounded-lg bg-gray-700 px-3 py-2 @error('foto_producto') border-red-500 @enderror">
                    @error('foto_producto')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Categoría --}}
                <div>
                    <label for="categoria" class="block text-gray-200 font-medium mb-1">Categoría</label>
                    <select id="categoria" name="categoria"
                            class="w-full px-4 py-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-400 focus:ring-opacity-50 @error('categoria') border-red-500 @enderror">
                        <option disabled selected>Seleccione una categoría</option>
                        @foreach($categorias as $c)
                            <option value="{{ $c->id }}" {{ old('categoria') == $c->id ? 'selected' : '' }}>
                                {{ $c->nombreCategoria }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Botón de Enviar --}}
                <div class="flex justify-between items-center">
                    <a href="{{ route('dashboard') }}" 
                       class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-4 py-2 rounded-lg transition">
                        Volver a Lista
                    </a>
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition">
                        Registrar Producto
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
