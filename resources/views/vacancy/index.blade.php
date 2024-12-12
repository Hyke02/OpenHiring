<!DOCTYPE html>
<html lang="nl">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>OpenHiring</title>
    <link rel="icon" href="{{ asset('storage/images/logo-oh.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
     <style>
         #language-selector {
             background-image: url('{{ asset('storage/images/taal_icon.png') }}');
             background-repeat: no-repeat;
             background-position: 10px center;
             background-size: 20px 20px;
             padding-left: 30px; /* ruimte voor het icoon */
         }
     </style>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
 </head>

<body class="overflow-x-hidden">

<x-navigation class="z-20"></x-navigation>
<x-info-icon></x-info-icon>
<div class="container mx-auto mt-8 max-w-full z-50">
    <!-- Language Selector -->
    <div class="flex justify-end mr-9">
        <div>
            <select id="language-selector" class="block appearance-none bg-white border border-gray-300 text-gray-700 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2 w-36">
                <option value="nl">Nederlands</option>
                <option value="en">Engels</option>
                <option value="tr">Turks</option>
                <option value="ar">Arabisch</option>
                <option value="de">Duits</option>
                <option value="pt">Portugees</option>
                <option value="it">Italiaans</option>
                <option value="pl">Pools</option>
                <option value="ro">Roemeens</option>
                <option value="el">Grieks</option>
                <option value="hu">Hongaars</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
{{--                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 text-gray-500">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>--}}
{{--                </svg>--}}
            </div>
        </div>
    </div>
</div>
<div class="mx-auto mt-8 max-w-full z-10">
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
                <button type="submit" class="bg-[#AA0061] text-white px-4 py-2 rounded-full shadow hover:bg-gray-600 w-full">Filter</button>
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
                <button type="submit" class="bg-[#AA0061] text-white px-4 py-2 rounded-full shadow hover:bg-gray-600 w-full">Zoeken</button>
            </div>
        </div>
    </form>


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 m-4 ">
        @foreach ($vacancies as $vacancy)
            <div class="bg-white shadow rounded-lg overflow-hidden border border-[#444343]">
            <h1 class="font-black text-2xl px-4 pt-5 vacancy-title">{{ $vacancy->name }}</h1>
                <h2 class="font-light text-lg font px-4 vacancy-company no-translate">{{ $vacancy->company_name }} - {{ $vacancy->location->location }}</h2>

                <div class="flex flex-row justify-between p-4">
                    <div class=" flex flex-col gap-2 mb-2 lg:mb-0 w-full lg:w-2/3">
                        <div class="bg-[#f2fade] shadow-[0_0_0_1.5px_#dee8ba] rounded-full p-3 inline-flex items-center w-fit">
                            <p class=" m-0 text-xs lg:text-sm">4-40 uur per week</p>
                        </div>
                        <div class="bg-[#f2fade] shadow-[0_0_0_1.5px_#dee8ba] rounded-full p-3 inline-block w-fit text-xs lg:text-sm w-fit">
                            <p>6 tot 16,35 euro per uur</p>
                        </div>
                        <div class="flex gap-2">
                            <div class="bg-[#f2fade] shadow-[0_0_0_1.5px_#dee8ba] rounded-full p-3 text-xs lg:text-sm w-fit">
                                <p>6 nodig</p>
                            </div>
                            <div class="bg-[#f2fade] shadow-[0_0_0_1.5px_#dee8ba] rounded-full p-3 text-xs lg:text-sm w-fit">
                                <p>10 wachtende</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center lg:justify-end items-center w-full lg:w-1/3">
                        <img src="{{ asset('storage/' . $vacancy->images) }}" alt="{{ $vacancy->vacancy_name }}" class="max-w-[145px] max-h-[145px] object-cover rounded-md">
                    </div>

                </div>

                <div class="flex justify-center">
                    <x-sub-button href="{{ route('vacancy.show', $vacancy->id) }}" class="button !py-5 !px-6 !text-base mb-5">
                        Bekijk vacature
                    </x-sub-button>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    const apiKey = 'AIzaSyDwysuHNeSGLCsqbdKxnjN2sbRTpPxe_0E';

    document.getElementById('language-selector').addEventListener('change', function () {
        translatePageContent(this.value);
    });

    function translatePageContent(targetLanguage) {
        const elements = [
            ...document.querySelectorAll('.vacancy-title, .vacancy-company, p'),
            ...document.querySelectorAll('select option'),
            ...document.querySelectorAll('button',),
            ...document.querySelectorAll('.button'),
            ...document.querySelectorAll('input[placeholder]')
        ];

        // Verzamel alle teksten van de elementen die vertaald moeten worden
        const texts = elements.map(el => el.tagName === 'INPUT' ? el.placeholder : el.innerText);

        // Verstuur de vertaalverzoeken naar de Google Translate API
        fetch(`https://translation.googleapis.com/language/translate/v2?key=${apiKey}`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ q: texts, target: targetLanguage, format: 'text' })
        })
            .then(response => response.json())
            .then(data => {
                if (data.data && data.data.translations) {
                    const translations = data.data.translations;
                    elements.forEach((el, i) => {
                        // Controleer of de vertaling beschikbaar is
                        if (translations[i] && translations[i].translatedText) {
                            const translation = translations[i].translatedText;
                            if (el.tagName === 'INPUT') {
                                el.placeholder = translation;
                            } else {
                                el.innerText = translation;
                            }
                        }
                    });
                }
            })
            .catch(error => console.error('Translation error:', error));
    }

</script>

</body>
