<x-guest-layout>
    <div class="flex flex-col items-center mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.6 8H19M9 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z" />
        </svg>
        <h1 class="text-3xl font-bold text-blue-400 mb-4">Supermercado</h1>
        <p class="text-gray-400 text-sm">Bienvenido de nuevo, ingresa tus credenciales</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
            <x-text-input id="email" class="block mt-1 w-full bg-gray-700 border-gray-600 text-white placeholder-gray-400 focus:ring-blue-400 focus:border-blue-400 rounded-xl" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-300" />
            <x-text-input id="password" class="block mt-1 w-full bg-gray-700 border-gray-600 text-white placeholder-gray-400 focus:ring-blue-400 focus:border-blue-400 rounded-xl" type="password" name="password" required autocomplete="current-password" />
        </div>

        <!-- Remember Me & Forgot -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="flex items-center text-sm text-gray-400">
                <input id="remember_me" type="checkbox" class="rounded border-gray-600 bg-gray-700 text-blue-500 focus:ring-blue-400" name="remember">
                <span class="ml-2">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-blue-400 hover:text-blue-300 hover:underline transition duration-150 ease-in-out" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Login Button -->
        <div>
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 transition duration-200 text-white font-semibold py-2.5 rounded-xl shadow-md">
                {{ __('Log in') }}
            </button>
        </div>

        <!-- Register link -->
        @if (Route::has('register'))
            <p class="text-center text-gray-400 text-sm mt-6">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 font-medium transition">Regístrate</a>
            </p>
        @endif
    </form>
</x-guest-layout>
