<x-guest-layout>
    <x-slot name="slot1">
        <x-navigation></x-navigation>
    </x-slot>

    <x-slot name="slot2">
        <p class="mb-10">Uw gegevens worden alleen gebruikt voor het aanmaken van een account en voor contact bij uitnodigingen. U krijgt een willekeurige naam zodat u anoniem blijft.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone number -->
            <div class="mt-4">
                <x-input-label for="number" :value="__('Telefoon')" />
                <x-text-input id="number" class="block mt-1 w-full" type="tel" name="number" :value="old('number')" required />
                <x-input-error :messages="$errors->get('number')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Wachtwoord')" />

                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Wachtwoord bevestigen')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-center mt-20">
                <x-primary-button class="px-16 py-3 !text-lg">
                    {{ __('Aanmelden') }}
                </x-primary-button>
            </div>

            <div class="flex items-center justify-center mt-10">
                <a class="font-radikal underline font-bold text-sm text-[#4A5520] hover:text-[#78AB3B] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-0 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Ik heb al een account') }}
                </a>
            </div>
        </form>
    </x-slot>

</x-guest-layout>
