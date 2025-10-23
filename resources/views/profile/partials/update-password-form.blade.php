<section>
    <header class="mb-6 border-b border-gray-700 pb-3">
        <h2 class="text-xl font-semibold text-blue-300">
            {{ __('Actualizar contraseña') }}
        </h2>
        <p class="mt-1 text-sm text-gray-400">
            {{ __('Asegúrate de que tu cuenta use una contraseña segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Contraseña actual')" />
            <x-text-input id="current_password" name="current_password" type="password"
                class="mt-1 block w-full bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-blue-400 focus:border-blue-400 rounded-xl"
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Nueva contraseña')" />
            <x-text-input id="password" name="password" type="password"
                class="mt-1 block w-full bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-blue-400 focus:border-blue-400 rounded-xl"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-blue-400 focus:border-blue-400 rounded-xl"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg transition">
                {{ __('Guardar') }}
            </x-primary-button>
            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-green-400">{{ __('Actualizada correctamente.') }}</p>
            @endif
        </div>
    </form>
</section>
