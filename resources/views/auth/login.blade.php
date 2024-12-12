<x-guest-layout>

    <x-slot name="slot1">
        <x-navigation></x-navigation>
    </x-slot>

    <x-slot name="slot2">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required  autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex justify-between mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-[#AA0160] shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800 transition-all duration-500" name="remember">
                        <span class="ms-2 text-sm text-gray-900">{{ __('Onthoud mij') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <div>
                            <a class="underline font-bold text-sm text-[#4A5520] hover:text-[#78AB3B] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-0 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Wachtwoord vergeten') }}
                            </a>
                        </div>
                        <div>
                            <a class="underline font-bold text-sm text-[#4A5520] hover:text-[#78AB3B] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-0 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">


                                {{__('Maak account aan')}}
                            </a>
                        </div>
                    @endif
                </div>

                <div class="flex items-center justify-center flex-col mt-20">
                    <x-primary-button class="px-16 py-3 !text-lg">
                        {{ __('Login') }}
                    </x-primary-button>

                    <a class="mt-10 underline font-bold text-sm text-[#4A5520] hover:text-[#78AB3B] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-0 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                        {{ __('Aanmelden') }}
                    </a>
                </div>
            </form>
    </x-slot>
</x-guest-layout>
