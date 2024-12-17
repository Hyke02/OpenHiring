<x-guest-layout>
    <x-slot name="slot1">
        <x-navigation></x-navigation>
        @if(auth()->user()->role == 'employer')

        @else
            <div class="px-6 py-2">
                <h1 class="text-2xl font-radikal font-normal">Mijn alias</h1>
                <div class="h-px my-1 bg-gray-400 "></div>
                <div class="text-4xl font-radikal font-black uppercase">
                    {{ auth()->user()->name }}
                </div>
            </div>

            <div class="my-6 px-6 py-4 border-y-2">
                <a class="font-radikal font-normal text-gray-700">Profiel bewerken</a>
            </div>
        @endif
    </x-slot>
</x-guest-layout>
