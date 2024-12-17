<!DOCTYPE html>
<html lang="nl">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>OpenHiring</title>
    <link rel="icon" href="{{ asset('storage/images/logo-oh.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-x-hidden">

<x-navigation class="z-20"></x-navigation>
<x-info-icon>placeholder text</x-info-icon>
<div class="container mx-auto mt-8 max-w-full z-50">



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
                <h1 class="font-black text-2xl px-4 pt-5 vacancy-title">{{ $vacancy->name }}</h1>
                <h2 class="font-light text-lg font px-4 vacancy-company no-translate">{{ $vacancy->company_name }} - {{ $vacancy->location->location }}</h2>

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
{{--                    <div class="flex justify-center lg:justify-end items-center w-full lg:w-1/3">--}}
{{--                        <img src="{{ asset('storage/' . $vacancy->images) }}" alt="{{ $vacancy->vacancy_name }}" class="max-w-[145px] max-h-[145px] object-cover rounded-md">--}}
{{--                    </div>--}}
                </div>

                <div class="flex justify-center">
                    <x-sub-button href="{{ route('vacancy.show', $vacancy->id) }}" class="button !py-3 !px-4 !text-base mb-5">
                        Bekijk vacature
                    </x-sub-button>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
