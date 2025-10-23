<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-blue-300 leading-tight tracking-wide">
            {{ __('Perfil de Usuario') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-900">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Información del perfil -->
            <div class="bg-gray-800/80 backdrop-blur-md shadow-xl rounded-2xl p-6 border border-gray-700">
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Actualizar contraseña -->
            <div class="bg-gray-800/80 backdrop-blur-md shadow-xl rounded-2xl p-6 border border-gray-700">
                @include('profile.partials.update-password-form')
            </div>

            <!-- Eliminar cuenta -->
            <div class="bg-gray-800/80 backdrop-blur-md shadow-xl rounded-2xl p-6 border border-gray-700">
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
</x-app-layout>
