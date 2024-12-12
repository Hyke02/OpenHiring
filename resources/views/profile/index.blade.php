<x-guest-layout>
    <x-slot name="slot1">
        <x-navigation></x-navigation>

        <div class="px-6 py-2">
            <h1 class="text-2xl font-radikal font-normal">Mijn alias</h1>
            <div class="h-px my-1 bg-gray-400 "></div>
            <div class="text-4xl font-radikal font-black uppercase">
                {{ auth()->user()->name }}
            </div>
        </div>
    </x-slot>
</x-guest-layout>
