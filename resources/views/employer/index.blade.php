<x-navigation></x-navigation>
<x-guest-layout>
    <x-slot name="slot1">
        <div class="flex justify-center flex-col p-6">
            <h1>Mijn vacatures</h1>

            @if($vacancies->isEmpty())
                <div>
                    Geen vacatures aangemaakt.
                </div>
            @else
                <div class="flex justify-center">
                    @foreach($vacancies as $vacancy)
                        <div class="m-3 px-3 py-4">
                            <h2>{{ $vacancy->name }}</h2>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </x-slot>
</x-guest-layout>
