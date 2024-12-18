<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Application</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=h2R8yjzX"></script>
</head>
<body class="bg-[#FBFCF7]">

<x-navigation></x-navigation>
<x-info-icon>Placeholder text</x-info-icon>

<!-- Vacature details -->
<div class="max-w-3xl mx-auto p-6">
    <div class="flex justify-center items-center h-full">
        <div class="w-1/2 flex justify-end">
            <img src="{{ $vacancy->logo }}" alt="" class="">
        </div>
    </div>

    <!-- Bedrijf en vacature naam -->
    <h1 class="text-4xl font-bold text-gray-900 mt-2 text-center">{{ $vacancy->job_title }}</h1>

{{--    img live example--}}
    <div>
        <img src="{{asset('storage/' . $vacancy->media)}}" alt="vacancy example">
    </div>
    <div>
        <h2 class="text-xl font-normal text-gray-800 text-center">{{ $vacancy->company_name }}</h2>
    </div>
    {{--    icon company--}}

    <div class="border-t border-gray-300 my-4"></div>

    <!-- Informatie sectie met icoontjes -->
    <div class="flex flex-wrap items-center mt-4 gap-4"> <!-- gap-4 in plaats van gap-8 -->
        <!-- Klokje met w-7 -->
        <p class="flex items-center text-gray-600">
            <img src="{{ asset('storage/images/8665257_clock_watch_icon.svg') }}" alt="Clock Icon" class="w-7 h-auto">
            <span class="ml-4">{{$vacancy->hours}} uur per week</span>
        </p>
        <p class="flex items-center text-gray-600">
            <img src="{{ asset('storage/images/3669413_location_ic_on_icon.svg') }}" alt="Location Icon" class="w-8 h-auto">
            <span class="ml-4">{{$vacancy->location->name}}</span>
        </p>
        <p class="flex items-center text-gray-600">
            <img src="{{ asset('storage/images/3669346_ic_symbol_euro_icon.svg') }}" alt="Euro Icon" class="w-8 h-auto">
            <span class="ml-4">{{$vacancy->salary}} euro per uur</span>
        </p>
        <p class="flex items-center text-gray-600">
            <img src="{{ asset('storage/images/factory.svg') }}" alt="Sector icon" class="w-8 h-auto">
            <span class="ml-4">{{$vacancy->sector->name}}</span>
        </p>
        <p class="flex items-center text-gray-600">
            <img src="{{ asset('storage/images/9004762_search_find_zoom_magnifier_icon.svg') }}" alt="Search Icon" class="w-8 h-auto">
            <span class="ml-4">{{$vacancy->wanted}} nodig</span>
        </p>
        <p class="flex items-center text-gray-600">
            <img src="{{ asset('storage/images/8541636_clipboard_list_icon.svg') }}" alt="Clipboard Icon" class="w-8 h-auto">
            <span class="ml-4">{{$vacancy->awaiting}} wachtende</span>
        </p>
    </div>

    <!-- Accordion secties voor meer informatie -->
    <div class="max-w-md mx-auto mt-6">
        <!-- Accordion Item 1 -->
        <div class="mb-4">
            <button type="button" onclick="toggleAccordion('desc1')" class="flex items-center justify-between bg-[#d9e8c9] text-black px-4 py-2 rounded-full border border-black shadow-md hover:shadow-lg transition duration-300 w-full">
                <span>Benodigde vaardigheden</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="desc1" class="hidden bg-white px-4 py-3 border border-gray-200 rounded-b-md">
                <ul class="list-disc pl-5 text-gray-700"> <!-- Maak het een lijst met bulletpoints -->
                    {{$vacancy->requirements}}
                </ul>
            </div>

        </div>

        <!-- Accordion Item 2 -->
        <div class="mb-4">
            <button type="button" onclick="toggleAccordion('desc2')" class="flex items-center justify-between bg-[#d9e8c9] text-black px-4 py-2 rounded-full border border-black shadow-md hover:shadow-lg transition duration-300 w-full">
                <span>Beschrijving</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="desc2" class="hidden bg-white px-4 py-3 border border-gray-200 rounded-b-md">
                <ul class="list-disc pl-5 text-gray-700">
                  {{$vacancy->description}}
                </ul>
            </div>
        </div>

        <!-- Accordion Item 3 -->
        <div class="mb-4">
            <button type="button" onclick="toggleAccordion('desc3')" class="flex items-center justify-between bg-[#d9e8c9] text-black px-4 py-2 rounded-full border border-black shadow-md hover:shadow-lg transition duration-300 w-full">
                <span>Wat wij u bieden</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="desc3" class="hidden bg-white px-4 py-3 border border-gray-200 rounded-b-md">
                <ul class="list-disc pl-5 text-gray-700">
                    {{$vacancy->offers}}
                </ul>
            </div>
        </div>
    </div>

    @auth()
        @if($fromMyVacancy)
            <a href="{{ route('vacancy.index') }}" class="w-full py-3 bg-[#AA0061] text-white font-semibold rounded-full hover:bg-[#8b004e] transition duration-300 text-center block">
                Terug naar Mijn Vacatures
            </a>
        @else
            <div class="flex justify-center">
                <button
                    class="uppercase applybutton mt-4 mb-3 px-4 w-fit py-3 bg-[#AA0061] text-white font-semibold rounded-full hover:bg-[#8b004e] transition duration-300"> <!-- Voeg onclick event toe -->
                    Solliciteer
                </button>
            </div>
        @endif
            <button
                onclick="readJobDetails(this)"
                class="w-full py-3 bg-[#AA0061] text-white font-semibold rounded-full hover:bg-[#8b004e] transition duration-300 text-center block">
                Lees voor
            </button>
    @else
        <div class="flex justify-center items-center h-full mt-6">
            <x-sub-button href="{{ route('login') }}" class="px-4 py-3 !text-lg my-10">Login om te solliciteren</x-sub-button>
        </div>
    @endauth

    <div id="modal" class="modal hidden flex fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="modal-content bg-white p-6 rounded-lg mx-6">
            <h2 class="text-xl font-semibold">Bevestig Sollicitatie</h2>
            <p>Weet je zeker dat je wilt solliciteren voor deze vacature?</p>
            <form action="{{route('vacancy.storeUser_id')}}" method="POST">
                @csrf
                <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">
                <div class="flex justify-center mt-4">
                    <button type="submit" class="bg-[#AA0061] text-white mx-2 py-2 px-4 rounded-full">Bevestigen</button>
                    <button type="button" class="modalClose bg-gray-400 text-white mx-2 py-2 px-4 rounded-full mr-2">Annuleren</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function solliciteer() {
            window.location.href = "/vacancy";
        }
    </script>


</div>

<script>
    // Functie voor het toggelen van de accordion secties
    function toggleAccordion(id) {
        const content = document.getElementById(id);
        content.classList.toggle('hidden');
    }

    //functie for text to speech
    function readJobDetails(button) {
        const parent = button.closest('.max-w-3xl')
        const headings = parent.querySelectorAll('h1, h2')
        const paragraphs = parent.querySelectorAll('p')

        let text = ''

        headings.forEach(heading => {
            text += heading.textContent + ' '
        })
        paragraphs.forEach(paragraph => {
            text += paragraph.textContent + ' '
        })
        responsiveVoice.speak(text, "Dutch Male")
    }
</script>

</body>
</html>
