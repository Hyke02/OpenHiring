<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>OpenHiring</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=h2R8yjzX"></script>
</head>
<body class="bg-[#FBFCF7]">
<x-navigation></x-navigation>
<x-info-icon></x-info-icon>
<button onclick="readPageContent()"
        class="bg-[#AA0061] text-white px-6 py-3 rounded-full shadow hover:bg-gray-600 uppercase w-full
         lg:w-auto">
    Lees alles voor
</button>

<section class="ml-5 mr-5 main">
    @if($vacanciesCount === 0)
        <div>
            <div class="mb-3 ">
                <h3>Het lijkt erop dat u nog geen inschrijvingen heeft.</h3>
            </div>
            <div class="mb-3">
                <p>Schrijf uzelf in voor een vacature en dan kunt u hier bekijken op welke plek u staat.</p>
            </div>
            <div class="mb-3">
                <a href="{{ route('vacancy.index') }}" class="bg-[#AA0061] text-white px-4 py-2 rounded-md shadow hover[#AA0061]">Bekijk vacatures</a>
            </div>
        </div>
    @endif
    @foreach($vacanciesWithDetails as $vacancyData)
            <div class="my-2 bg-white shadow rounded-lg overflow-hidden border px-3 py-4
            @if($vacancyData['invitation'] && $vacancyData['invitation']->status === 'pending') border-[#ffc14f] @else border-[#444343] @endif">
                <h1 class="font-black text-2xl vacancy-title">{{ $vacancyData['vacancy']->job_title }}</h1>
                <h2 class="font-light text-lg font vacancy-company no-translate">{{ $vacancyData['vacancy']->company_name }} - {{ $vacancyData['vacancy']->location->name }}</h2>

                <p class="bg-[#f2fade] shadow-[0_0_0_1.5px_#dee8ba] rounded-full p-3 inline-block text-xs lg:text-sm w-fit my-5">wachtlijst positie: <strong class="ml-1">{{ $vacancyData['position'] }}</strong></p>
                <div class="flex justify-between items-center">
                    <x-sub-button href="{{ url(route('vacancy.show',['id' => $vacancyData['vacancy']->id,  'from' => 'my-vacancy'])) }}" class="button !py-3 !px-4 !text-base " >Bekijk vacature</x-sub-button>


                    <button id="unapplyButton" class="unapplyButton uppercase !text-xs w-fit px-4 py-3 bg-gray-400 text-white font-semibold rounded-full hover:bg-[#8b004e] transition duration-300"
                            data-id="{{ $vacancyData['vacancy']->id }}"
                            data-name="{{ $vacancyData['vacancy']->name }}"
                            data-url="{{ url(route('invitation.destroy', ['id' => $vacancyData['invitation']->id])) }}">
                        Schrijf uit
                    </button>
                </div>
                <p class="mt-4 text-gray-500">Ingeschreven op: {{ $vacancyData['invitation']->created_at->format('d-m-Y') }}</p>
                <div>
                    <x-sub-button
                        onclick="readJobDetails(this)"
                        class="button !py-3 !px-4 !text-base mt-3">
                        Lees voor
                    </x-sub-button>
                    @if($vacancyData['invitation'] && $vacancyData['invitation']->status === 'pending')
                        <x-sub-button href="{{ route('invitation.show', ['id' => $vacancyData['invitation']->id]) }}">
                            Uitnodiging
                        </x-sub-button>
                    @endif
                </div>
            </div>
    @endforeach
</section>

<div id="modal" class="modal hidden flex fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50">
    <div class="modal-content bg-white p-6 rounded-lg mx-6">
        <h2 class="text-xl font-semibold">Bevestig uitschrijving</h2>
        <p id="modalText">Weet u zeker dat u zich wilt uitschrijven voor deze vacature? U komt onderaan de wachtrij te staan wanneer u zich opnieuw solliciteert.</p>
        <form id="modalForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-center mt-4">
                <button type="submit" class="bg-[#AA0061] text-white mx-2 py-2 px-4 rounded-full">Bevestigen</button>
                <button type="button" id="modalClose" class="modalClose bg-gray-400 text-white mx-2 py-2 px-4 rounded-full mr-2">Annuleren</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
<script>
    function readJobDetails(button) {
        const parent = button.closest('div')
        const headings = parent.querySelectorAll('h1, h2')
        const paragraphs = parent.querySelectorAll('p')

        let text = '';
        headings.forEach(heading => {
            text += heading.textContent + ' '
        })
        paragraphs.forEach(paragraph => {
            text += paragraph.textContent + ' '
        })
        if (text) {
            responsiveVoice.speak(text, "Dutch Male")
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
            mainElement.querySelectorAll('h1, h2, h3, p').forEach(el => {
                if (el.textContent.trim()) {
                    let content = el.textContent.trim()
                    if (content) {
                        content = content.replace(/([.?!])\s*(?=[A-Za-z])/g, '$1 ')
                        text += content + ' '
                    }
                }
            })

            if (text) {
                responsiveVoice.speak(text, voice)
            }
        }
    }
</script>
