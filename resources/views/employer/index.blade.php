<x-navigation></x-navigation>
<x-guest-layout>
    <x-slot name="slot1">
        <div class="flex justify-center flex-col px-6 py-8">
            <h1 class="font-radikal text-7xl text-center">Vacatures</h1>

            @if($vacancies->isEmpty())
                <div>
                    Geen vacatures aangemaakt.
                </div>
            @else
                <div class="flex justify-center mt-5">
                    @foreach($vacancies as $vacancy)
                        <div class="m-3 px-3 py-4">
                            <div>
                                <h1 class="font-radikal font-black text-2xl px-4 pt-5 vacancy-title">{{ $vacancy->name }}</h1>
                                <h2 class="font-radikal font-light text-lg font px-4 vacancy-company no-translate">{{ $vacancy->location->location }}</h2>
                            </div>
                            <div class="bg-[#f2fade] shadow-[0_0_0_1.5px_#dee8ba] rounded-full px-3 py-1 m-4 text-xs lg:text-sm w-fit">
                                <p>{{ $vacancy->awaiting }} wachtende</p>
                            </div>
                            <a href="{{ route('employer.job.show', $vacancy) }}">Bekijk vacature</a>
                            <div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </x-slot>
</x-guest-layout>
