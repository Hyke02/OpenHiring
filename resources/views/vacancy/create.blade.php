<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Create vacature</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FBFCF7] p-6">

<div class="mb-6">
    <x-navigation />
</div>

<div class="max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-4">Vacature aanmaken</h1>

    <form method="POST" action="{{url(route('vacancy.store'))}}" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            <ul>
        @foreach($errors->all() as $error)
            <div>
                <li>{{$error}}</li>
            </div>
        @endforeach
            </ul>
        @endif

        <div>
            <label for="logo" class="block text-lg font-medium mb-1">Logo bedrijf</label>
            <input type="file" id="logo" name="logo" accept="image/*" class="w-full border border-black rounded-md p-2 focus:ring-2 focus:ring-[#B80063]">
        </div>

        <div>
            <label for="media" class="block text-lg font-medium mb-1">Foto vacature</label>
            <input type="file" id="media" name="media" accept="image/*" class="w-full border border-black rounded-md p-2 focus:ring-2 focus:ring-[#B80063]">
        </div>

        <div>
            <label for="company_name" class="block text-lg font-medium mb-1">Bedrijfsnaam</label>
            <input type="text" id="company_name" name="company_name" class="w-full border border-black rounded-md p-2 focus:ring-2 focus:ring-[#B80063]">
        </div>

        <div>
            <label for="job_title" class="block text-lg font-medium mb-1">Functietitel</label>
            <input type="text" id="job_title" name="job_title" class="w-full border border-black rounded-md p-2 focus:ring-2 focus:ring-[#B80063]">
        </div>

        <div>
            <label for="hours" class="block text-lg font-medium mb-1">Uren</label>
            <input type="number" id="hours" name="hours" class="w-full border border-black rounded-md p-2 focus:ring-2 focus:ring-[#B80063]">
        </div>

        <div>
            <label for="location" class="block text-lg font-medium mb-1">Locatie</label>
            <input type="text" id="location" name="location" class="w-full border border-black rounded-md p-2 focus:ring-2 focus:ring-[#B80063]">
        </div>

        <div>
            <label for="salary" class="block text-lg font-medium mb-1">Salaris</label>
            <input type="number" id="salary" name="salary" step="0.01" min="0" class="w-full border border-black rounded-md p-2 focus:ring-2 focus:ring-[#B80063]">
        </div>

        <div>
            <label for="sector" class="block text-lg font-medium mb-1">Sector</label>
            <select id="sector_id" name="sector_id" class="w-full border border-black rounded-md p-2 focus:ring-2 focus:ring-[#B80063]">
                <option>Selecteer een sector</option>
                @foreach($sectors as $sector)
                    <option value="{{$sector->id}}">{{$sector->name}}</option>
                @endforeach
            </select>

        </div>

        <div>
            <label for="wanted" class="block text-lg font-medium mb-1">Hoeveel mensen nodig</label>
            <input type="number" id="wanted" name="wanted" class="w-full border border-black rounded-md p-2 focus:ring-2 focus:ring-[#B80063]">
        </div>

        <div>
            <label for="requirements" class="block text-lg font-medium mb-1">Benodigdheden</label>
            <textarea id="requirements" name="requirements" rows="5" class="w-full border border-black rounded-md p-2 focus:ring-2 focus:ring-[#B80063]"></textarea>
        </div>

        <div>
            <label for="description" class="block text-lg font-medium mb-1">Beschrijving</label>
            <textarea id="description" name="description" rows="5" class="w-full border border-black rounded-md p-2 focus:ring-2 focus:ring-[#B80063]"></textarea>
        </div>

        <div>
            <label for="offers" class="block text-lg font-medium mb-1">Wat biedt uw bedrijf</label>
            <textarea id="offers" name="offers" rows="5" class="w-full border border-black rounded-md p-2 focus:ring-2 focus:ring-[#B80063]"></textarea>
        </div>

            <input type="hidden" name="awaiting" value="0">

        <div>
            <button type="submit" class="bg-[#B80063] text-white font-bold py-2 px-4 rounded-md hover:bg-[#9f004f]">Maak vacature aan</button>
        </div>
    </form>
</div>

</body>
</html>
