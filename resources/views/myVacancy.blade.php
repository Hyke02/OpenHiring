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
</head>
<body class="bg-[#FBFCF7] overflow-x-hidden">
<x-navigation></x-navigation>
<x-info-icon></x-info-icon>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 m-4">
    @foreach($vacanciesWithPosition as $vacancyData)
            <div class=" bg-white shadow rounded-lg overflow-hidden border border-[#444343] px-3 py-4">
                <h1 class="font-black text-2xl vacancy-title">{{ $vacancyData['vacancy']->name }}</h1>
                <h2 class="font-light text-lg font vacancy-company no-translate">{{ $vacancyData['vacancy']->company_name }} - {{ $vacancyData['vacancy']->location->location }}</h2>

                <p class="bg-[#f2fade] shadow-[0_0_0_1.5px_#dee8ba] rounded-full p-3 inline-block text-xs lg:text-sm w-fit my-5">wachtlijst positie: <strong class="ml-1">{{ $vacancyData['position'] }}</strong></p>

                <div class="flex justify-between items-center">
                    <x-sub-button href="{{ url(route('vacancy.show',['id' => $vacancyData['vacancy']->id,  'from' => 'my-vacancy'])) }}" class="button !py-3 !px-4 !text-base " >Bekijk vacature</x-sub-button>


                    <button id="unapplyButton" class="unapplyButton uppercase !text-xs w-fit px-4 py-3 bg-[#AA0061] text-white font-semibold rounded-full hover:bg-[#8b004e] transition duration-300"
                            data-id="{{ $vacancyData['vacancy']->id }}"
                            data-name="{{ $vacancyData['vacancy']->name }}"
                            data-url="{{ url(route('invitation.destroy', ['id' => $vacancyData['invitation']->id])) }}">
                        Schrijf uit
                    </button>
                </div>
            </div>
    @endforeach
</div>

<div id="modal" class="modal hidden flex fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50">
    <div class="modal-content bg-white p-6 rounded-lg mx-6">
        <h2 class="text-xl font-semibold">Bevestig Sollicitatie</h2>
        <p id="modalText">Weet u zeker dat u zich wilt uitschrijven voor deze vacature? U komt onderaan de wachtrij te staan wanneer u zich opnieuw solliciteert.</p>
        <form id="modalForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-center mt-4">
                <button type="submit" class="bg-[#AA0061] text-white mx-2 py-2 px-4 rounded-full">Bevestigen</button>
                <button type="button" class="modalClose bg-gray-400 text-white mx-2 py-2 px-4 rounded-full mr-2">Annuleren</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
