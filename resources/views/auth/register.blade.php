<x-guest-layout>
    <div class="flex flex-col items-center mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.6 8H19M9 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z" />
        </svg>
        <h1 class="text-3xl font-bold text-blue-400 mb-4">Crear cuenta</h1>
        <p class="text-gray-400 text-sm">Regístrate para empezar a usar Supermercado</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-gray-300" />
            <x-text-input id="name" class="block mt-1 w-full bg-gray-700 border-gray-600 text-white placeholder-gray-400 focus:ring-blue-400 focus:border-blue-400 rounded-xl" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
            <x-text-input id="email" class="block mt-1 w-full bg-gray-700 border-gray-600 text-white placeholder-gray-400 focus:ring-blue-400 focus:border-blue-400 rounded-xl" type="email" name="email" :value="old('email')" required autocomplete="username" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-300" />
            <x-text-input id="password" class="block mt-1 w-full bg-gray-700 border-gray-600 text-white placeholder-gray-400 focus:ring-blue-400 focus:border-blue-400 rounded-xl" type="password" name="password" required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-300" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-700 border-gray-600 text-white placeholder-gray-400 focus:ring-blue-400 focus:border-blue-400 rounded-xl" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        <!-- Register Button -->
        <div>
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 transition duration-200 text-white font-semibold py-2.5 rounded-xl shadow-md">
                {{ __('Register') }}
            </button>
        </div>

        <p class="text-center text-gray-400 text-sm mt-6">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 font-medium transition">Inicia sesión</a>
        </p>
    </form>
</x-guest-layout>
