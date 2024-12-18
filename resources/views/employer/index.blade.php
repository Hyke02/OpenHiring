<x-navigation></x-navigation>
<x-guest-layout>
    <x-slot name="slot1">
        <div class="flex justify-center flex-col px-6 py-8">
            <h1 class="font-radikal text-7xl text-center">Vacatures</h1>
            <div class="flex justify-center">
                <a href="{{ route('vacancy.create') }}" class="mt-3 bg-[#AA0061] text-white mx-2 py-2 px-4 rounded-full w-1/5 ">Maak een vacature aan</a>
            </div>

            @if($vacancies->isEmpty())
                <div>
                    Geen vacatures aangemaakt.
                </div>
            @else
                <div class="flex justify-center mt-5">
                    @foreach($vacancies as $vacancy)
                        <div class="m-3 px-3 py-4 border-black border rounded bg-[#FFFFFF]/80 w-4/5 flex justify-center flex-col align-middle">
                            <div>
                                <h1 class="font-radikal font-black text-4xl px-4 pt-5 vacancy-title flex justify-center">{{ $vacancy->job_title }}</h1>
                                <h2 class="font-radikal font-light text-2xl font px-4 vacancy-company no-translate flex justify-center">{{ $vacancy->location->name }}</h2>
                            </div>
                            <div class="bg-[#f2fade] shadow-[0_0_0_1.5px_#dee8ba] rounded-full px-3 py-1 m-4 text-xs lg:text-sm w-fit flex justify-center ">
                                <p class="flex justify-center">{{ $vacancy->awaiting }} wachtende</p>
                            </div>
                            <div>
                                <a href="{{ route('vacancy.show', $vacancy) }}" class="bg-[#AA0061] text-white mx-2 py-2 px-4 rounded-full flex justify-center">Bekijk vacature</a>
                                <a href="{{ route('employer.job.show', $vacancy) }}" class="bg-[#AA0061] text-white mx-2 py-2 px-4 rounded-full flex justify-center mt-5">Nodig mensen uit</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </x-slot>
</x-guest-layout>
