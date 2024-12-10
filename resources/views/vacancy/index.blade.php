 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>OpenHiring</title>
    <link rel="icon" href="{{ asset('storage/images/logo-oh.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="overflow-x-hidden">

<div class="container mx-auto mt-8 max-w-full">
    <form method="GET" action="{{ route('vacancy.index') }}" class="mb-8">
        <div class="flex gap-4 items-center mb-4 m-10">
            <div class="flex-1">
                <select name="sector" id="sector" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Selecteer een Sector</option>
                    @foreach ($sectors as $sector)
                        <option value="{{ $sector->id }}" {{ request('sector') == $sector->id ? 'selected' : '' }}>
                            {{ $sector->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" class="bg-[#AA0061] text-white px-4 py-2 rounded-md shadow hover[#AA0061]">Filter</button>
            </div>
        </div>

        <div class="flex gap-4 items-center m-10">
            <!-- Zoek form -->
            <div class="flex-1">
                <input type="text" name="search" placeholder="Zoek" value="{{ request('search') }}"
                       class="block w-full border-gray-300 rounded-md shadow-sm focus:border-[#D6E2B5]">
            </div>

            <!-- Zoek button -->
            <div>
                <button type="submit" class="bg-[#AA0061] text-white px-4 py-2 rounded-md shadow hover:bg-gray-600">Zoeken</button>
            </div>
        </div>
    </form>


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 m-4 ">
        @foreach ($vacancies as $vacancy)
            <div class="bg-white shadow rounded-lg overflow-hidden border border-[#444343]">
            <h1 class="text-lg font-semibold px-4 py-2">{{ $vacancy->vacancy_name }}</h1>
                <h2 class="text-lg font px-4 py-2">{{ $vacancy->company_name }} - {{ $vacancy->location->location }}</h2>

                <div class="flex flex-row justify-between p-4">
                    <div class="flex flex-col gap-4 mb-4 lg:mb-0 w-full lg:w-2/3">
                        <div class="border-3 border-[#E2ECC8] bg-[#D6E2B5] inline-flex items-center rounded-full w-fit p-3">
                            <p class="m-0 text-xs lg:text-sm">4-40 uur per week</p>
                        </div>

                        <div class="border-3 border-[#E2ECC8] bg-[#D6E2B5] p-3 rounded-full inline-block w-fit text-xs lg:text-sm">
                            <p>6 tot 16,35 euro per uur</p>
                        </div>

                        <div class="flex gap-4 flex-row">
                            <div class="border-3 border-[#E2ECC8] bg-[#D6E2B5] p-3 rounded-full text-xs lg:text-sm whitespace-nowrap w-fit">
                                <p>6 nodig</p>
                            </div>
                            <div class="border-3 border-[#E2ECC8] bg-[#D6E2B5] p-3 rounded-full text-xs lg:text-sm whitespace-nowrap w-fit">
                                <p>10 wachtende</p>
                            </div>
                        </div>
                    </div>


                    <div class="flex justify-center lg:justify-end items-center w-full lg:w-1/3 lg:mt-0 ">
                        <img
                            src="{{ asset('storage/' . $vacancy->images) }}"
                            alt="{{ $vacancy->vacancy_name }}"
                            class="max-w-[145px] max-h-[145px] object-cover rounded-md"
                        >
                    </div>

                </div>

                <div class="flex justify-center mt-4">
                    <a href="{{ route('vacancy.show', $vacancy->id) }}" class="bg-[#AA0061] text-white px-4 py-2 mb-2 rounded-md hover:bg-[#FBFCF7] mb-6">
                        Bekijk Vacature
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
