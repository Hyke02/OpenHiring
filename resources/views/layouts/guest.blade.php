<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body style="background-image: url('{{ asset('storage/images/openhiring_logo_10%.svg') }}')" class="slot1 flex flex-col min-h-screen bg-[#FBFCF7] bg-center bg-no-repeat font-sans text-gray-900 antialiased lg:bg-[length:25vw] sm:bg-[length:90%]">
        @isset($slot1)
            {{ $slot1 }}
        @endisset
        <div class="flex flex-col justify-center items-center flex-grow pb-10">
            <div class="slot2 w-full sm:max-w-md px-6 py-4 overflow-hidden sm:rounded-lg">
                @isset($slot2)
                    {{ $slot2 }}
                @endisset
            </div>
        </div>
    </body>
</html>
