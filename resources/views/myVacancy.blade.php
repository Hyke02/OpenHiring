<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>OpenHiring</title>
</head>
<body class="bg-[#FBFCF7] ">
<x-navigation></x-navigation>

<section class="ml-5 mr-5">
    @foreach($vacanciesWithPosition as $vacancyData)
    <div class=" bg-[#FFFFFF] mb-10 flex flex-col flex-wrap justify-center border-black border-2 rounded-xl border-opacity-50 ml-5 mr-5 p-2 gap-2.5">
        <h1>{{ $vacancyData['vacancy']->name }}</h1>
        <h3>{{ $vacancyData['vacancy']->company_name }}</h3>
        <h2>{{ $vacancyData['vacancy']->location->location }}</h2>
        <p class="border-3 border-[#E2ECC8] bg-[#D6E2B5] inline-flex items-center rounded-full w-fit p-2">wachtlijst positie: <strong class="ml-1">{{ $vacancyData['position'] }}</strong></p>
    </div>
    @endforeach
</section>

</body>
</html>