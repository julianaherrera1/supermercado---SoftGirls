<section class="space-y-6">
    <header class="mb-6 border-b border-gray-700 pb-3">
        <h2 class="text-xl font-semibold text-red-400">
            {{ __('Eliminar cuenta') }}
        </h2>
        <p class="mt-1 text-sm text-gray-400">
            {{ __('Una vez elimines tu cuenta, todos tus datos se borrarán permanentemente.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-lg transition">
        {{ __('Eliminar cuenta') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-200">{{ __('¿Estás seguro de que deseas eliminar tu cuenta?') }}</h2>

            <p class="mt-1 text-sm text-gray-400">
                {{ __('Por favor ingresa tu contraseña para confirmar que deseas eliminar permanentemente tu cuenta.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Contraseña') }}" class="sr-only" />
                <x-text-input id="password" name="password" type="password"
                    class="mt-1 block w-3/4 bg-gray-700 border border-gray-600 text-white rounded-xl focus:ring-red-500 focus:border-red-500"
                    placeholder="{{ __('Contraseña') }}" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')" class="hover:bg-gray-700 text-gray-300">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ml-3 bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-lg transition">
                    {{ __('Eliminar cuenta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
