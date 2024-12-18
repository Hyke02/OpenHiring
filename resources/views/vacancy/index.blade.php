<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>OpenHiring</title>
    <link rel="icon" href="{{ asset('storage/images/logo-oh.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=h2R8yjzX"></script>
</head>

<body class="overflow-x-hidden bg-[#FBFCF7]">

<x-navigation class="z-20"></x-navigation>
<x-info-icon>placeholder text</x-info-icon>
<div class="container mx-auto mt-8 max-w-full z-50">
    <x-sub-button onclick="readPageContent()"
        onclick="readPageContent(this)"
        class="button !py-3 !pl-4 !text-base ml-4">
        Lees alles voor
    </x-sub-button>



</div>

<div id="main" class="mx-auto mt-8 max-w-full z-10 ">
    <form method="GET" action="{{ route('vacancy.index') }}" class="mb-8">
        <div class="flex gap-4 items-center mb-4 mx-4">
            <div class="flex-1">
                <select name="sector" id="sector" class="p-3 font-medium block w-full [#444343] rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Selecteer een Sector</option>
                    @foreach ($sectors as $sector)
                        <option class="font-medium" value="{{ $sector->id }}" {{ request('sector') == $sector->id ? 'selected' : '' }}>
                            {{ $sector->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" class="bg-[#AA0061] text-white px-4 py-2 rounded-full shadow hover:bg-gray-600 w-full uppercase">Filter</button>
            </div>
        </div>

        <div class="flex gap-4 items-center mt-1 mx-4">
            <!-- Zoek form -->
            <div class="flex-1">
                <input type="text" name="search" placeholder="Zoek" value="{{ request('search') }}"
                       class="p-3 font-medium block w-full [#444343] rounded-md shadow-sm focus:border-[#D6E2B5]">
            </div>

            <!-- Zoek button -->
            <div>
                <button type="submit" class="bg-[#AA0061] text-white px-4 py-2 rounded-full shadow hover:bg-gray-600 w-full uppercase">Zoeken</button>
            </div>
        </div>
    </form>


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 m-4">
        @foreach ($vacancies as $vacancy)
            <div class="bg-white shadow rounded-lg overflow-hidden border border-[#444343]">
                <h1 class="font-black text-2xl px-4 pt-5 vacancy-title">{{ $vacancy->job_title }}</h1>
                <h2 class="font-light text-lg font px-4 vacancy-company no-translate vacancy-location no-translate">{{ $vacancy->company_name }} - {{ $vacancy->location->name }}</h2>

                <div class="flex flex-row justify-between p-4">
                    <div class=" flex flex-col gap-2 mb-2 lg:mb-0 w-full lg:w-2/3">
                        <div class="flex mt-2" >
                            <img src="{{ asset('storage/images/8665257_clock_watch_icon.svg') }}" alt="Clock Icon" class="w-7 h-auto mr-2 mt-1">
                            <div class="bg-[#f2fade] shadow-[0_0_0_1.5px_#dee8ba] rounded-full p-3 inline-flex items-center w-fit">
                                <p class=" m-0 text-xs lg:text-sm"> {{ $vacancy->hours }} uur per week </p>
                            </div>
                        </div>
                        <div class="flex mt-2">
                            <img src="{{ asset('storage/images/3669346_ic_symbol_euro_icon.svg') }}" alt="Euro Icon" class="w-8 h-auto mr-2">
                            <div class="bg-[#f2fade] shadow-[0_0_0_1.5px_#dee8ba] rounded-full p-3 inline-block text-xs lg:text-sm w-fit">
                                <p>{{ $vacancy->salary }} euro per maand</p>
                            </div>
                        </div>
                        <div class="flex mt-2">
                            <img src="{{ asset('storage/images/9004762_search_find_zoom_magnifier_icon.svg') }}" alt="Search Icon" class="w-8 h-auto mr-2">
                            <div class="bg-[#f2fade] shadow-[0_0_0_1.5px_#dee8ba] rounded-full p-3 text-xs lg:text-sm w-fit">
                                <p>{{ $vacancy->wanted }} nodig</p>
                            </div>
                        </div>
                        <div class="flex mt-2">
                            <img src="{{ asset('storage/images/8541636_clipboard_list_icon.svg') }}" alt="Clipboard Icon" class="w-8 h-auto mr-2">
                            <div class="flex gap-2">
                                <div class="bg-[#f2fade] shadow-[0_0_0_1.5px_#dee8ba] rounded-full p-3 text-xs lg:text-sm w-fit">
                                    <p>{{ $vacancy->awaiting}} wachtende</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center lg:justify-end items-center w-full lg:w-1/3">
                        <img src="{{ asset('storage/' . $vacancy->logo) }}" alt="{{ $vacancy->vacancy_name }}" class="max-w-[145px] max-h-[145px] object-cover rounded-md">
                    </div>
                </div>

                <div class="flex justify-between m-4">
                    <x-sub-button href="{{ route('vacancy.show', $vacancy->id) }}" class="button !py-3 !px-4 !text-base mb-5">
                        Bekijk vacature
                    </x-sub-button>
                    <x-sub-button
                        onclick="readJobDetails(this)"
                        class="button !py-3 !px-4 !text-base mb-5">
                        Lees voor
                    </x-sub-button>
                </div>
            </div>
        @endforeach
{{--@dd($vacancies)--}}
            <div class="flex justify-between">
            @if ($vacancies->onFirstPage())
                    <x-button disabled> Vorige pagina</x-button>
            @else
                    <a href="{{ $vacancies->previousPageUrl() }}" class="bg-[#AA0061] text-white px-4 py-2 rounded-md shadow hover[#AA0061]">
                        Vorige pagina
                    </a>
            @endif

            @if ($vacancies->hasMorePages())
                    <a href="{{ $vacancies->nextPageUrl() }} " class="bg-[#AA0061] text-white px-4 py-2 rounded-md shadow hover[#AA0061]">
                        Volgende pagina
                    </a>
            @else
                <x-button disabled> Volgende pagina</x-button>
            @endif
        </div>
            <div class="flex justify-center gap-1">
                @for ($page = 1; $page <= $vacancies->lastPage(); $page++)
                    @if ($page == $vacancies->currentPage())
                        <span class="bg-[#AA0061] text-white px-4 py-2 rounded shadow">{{ $page }}</span>
                    @else
                        <a href="{{ $vacancies->url($page) }}" class="bg-gray-300 text-gray-600 px-4 py-2 rounded hover:bg-gray-400">{{ $page }}</a>
                    @endif
                @endfor
            </div>
    </div>
</div>

</body>
</html>

<script>
    const voiceMapping = {
        nl: "Dutch Male",
        en: "UK English Male",
        de: "Deutsch Male",
        pt: "Brazilian Portuguese Male",
        it: "Italian Male",
        pl: "Polish Male",
        ro: "Romanian Male",
        el: "Greek Male",
        hu: "Hungarian Male"
    };
    function readJobDetails(button) {
        const parent = button.closest('.bg-white');
        const headings = parent.querySelectorAll('h1, h2');
        const paragraphs = parent.querySelectorAll('p');
        // Haal de geselecteerde taal op uit de dropdown
        const languageCode = document.getElementById('language-selector').value;
        const voice = voiceMapping[languageCode];
        let text = '';
        headings.forEach(heading => {
            text += heading.textContent + ' ';
        });
        paragraphs.forEach(paragraph => {
            text += paragraph.textContent + ' ';
        });
        if (text) {
            responsiveVoice.speak(text, voice);
        }
    }
</script>

<script>
    function readPageContent() {
        const voiceMapping = {
            nl: "Dutch Male",
            en: "UK English Male",
            de: "Deutsch Male",
            pt: "Brazilian Portuguese Male",
            it: "Italian Male",
            pl: "Polish Male",
            ro: "Romanian Male",
            el: "Greek Male",
            hu: "Hungarian Male"
        }

        const languageSelector = document.getElementById('language-selector')
        const languageCode = languageSelector ? languageSelector.value : 'nl'
        const voice = voiceMapping[languageCode] || "Dutch Male"

        const mainElement = document.getElementById('main')

        if (mainElement) {
            let text = ''
            mainElement.querySelectorAll('h1, h2, h3, p, button, a').forEach(el => {
                if (el.textContent.trim()) {
                    text += el.textContent.trim() + ' '
                }
            })

            if (text) {
                responsiveVoice.speak(text, voice)
            }
        }
    }
</script>
