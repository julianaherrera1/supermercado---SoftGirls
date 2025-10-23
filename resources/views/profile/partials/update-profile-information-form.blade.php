<section>
    <header class="mb-6 border-b border-gray-700 pb-3">
        <h2 class="text-xl font-semibold text-blue-300">
            {{ __('Información del perfil') }}
        </h2>
        <p class="mt-1 text-sm text-gray-400">
            {{ __('Actualiza la información de tu cuenta y tu dirección de correo electrónico.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Nombre -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text"
                class="mt-1 block w-full bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-blue-400 focus:border-blue-400 rounded-xl"
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" name="email" type="email"
                class="mt-1 block w-full bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-blue-400 focus:border-blue-400 rounded-xl"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg transition">
                {{ __('Guardar') }}
            </x-primary-button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-green-400">{{ __('Guardado correctamente.') }}</p>
            @endif
        </div>
    </form>
</section>
