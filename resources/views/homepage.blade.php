<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('storage/images/logo-oh.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home Page</title>
</head>
<body class="bg-[#FBFCF7] p-10">
<div class="relative z-20">
    <x-navigation /> <!-- Ensure your navigation has proper z-index -->
</div>

<header class="py-8">
    <div class="mx-auto flex flex-col lg:flex-row items-center lg:items-start lg:justify-between space-y-8 lg:space-y-0 lg:space-x-8">
        <!-- Image with mask -->
        <div class="relative w-full sm:w-auto sm:h-64 md:h-80 lg:h-96">
            <!-- Shadow mask image beneath the main image -->
            <div
                class="absolute inset-0 transform scale-105 translate-y-4"
                style="mask-image: url('{{ asset('storage/images/OpenHiring-logo.svg') }}');
                    -webkit-mask-image: url('{{ asset('storage/images/OpenHiring-logo.svg') }}');
                    mask-size: contain;
                    -webkit-mask-size: contain;
                    mask-position: center;
                    -webkit-mask-position: center;
                    background-color: #e2ecc9;
                    opacity: 0.6;">
            </div>

            <!-- Main image with mask -->
            <img
                src="{{ asset('storage/images/man-openhiring.jpeg') }}"
                alt="OpenHiring Logo"
                class="object-contain w-full h-full"
                style="mask-image: url('{{ asset('storage/images/OpenHiring-logo.svg') }}');
                    -webkit-mask-image: url('{{ asset('storage/images/OpenHiring-logo.svg') }}');
                    mask-size: contain;
                    -webkit-mask-size: contain;
                    mask-position: center;
                    -webkit-mask-position: center;">
        </div>
    </div>
</header>
    <div>
        <!-- Text content -->
        <div class="flex-1 text-center lg:text-left mt-16 lg:mt-0">  <!-- Increased margin-top to mt-16 for more space above -->
            <h1 class="text-4xl font-bold text-gray-800 mb-6">Een baan zonder sollicitatiegesprek</h1> <!-- Increased mb for more space -->
            <p class="text-lg text-gray-700 leading-relaxed mb-8">  <!-- Increased mb for more space -->
                Iedereen een eerlijke kans op een baan. Daar draait het om bij Open Hiring. Het gaat er niet om of iemand
                een diploma, vlotte babbel of bakken ervaring heeft, maar of iemand wíl en kan werken. Bedrijven die mensen
                zoeken via Open Hiring houden dus geen sollicitatiegesprekken. Zo hebben vooroordelen geen kans. Werkzoekenden
                bepalen zelf of ze geschikt zijn voor een baan. Zo maken we de arbeidsmarkt eerlijk. En krijgen we mensen
                snel (weer) aan het werk.
            </p>
            <button class="mt-6 px-6 py-3 bg-[#B80063] text-white font-medium rounded-md shadow-md hover:bg-[#A00058] transition">
                Bekijk Vacature
            </button>
        </div>
    </div>

<!-- Principles Section -->
<section class="py-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">3 Principes: waar gelooft Open Hiring in?</h2>
    <div class="space-y-16 px-6">
        <div class="text-center">
            <span class="block mb-1 text-[12rem] font-extrabold" style="color: #92aa83;">1</span>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Het werkt beter zonder (voor)oordelen</h3>
            <p class="text-gray-700 leading-relaxed">
                Met Open Hiring krijgen (voor)oordelen geen kans. En mensen die vaak (onbewust) worden uitgesloten juist wel. Dat maakt de arbeidsmarkt eerlijker en mooier.
            </p>
        </div>
        <div class="text-center">
            <span class="block mb-1 text-[12rem] font-extrabold" style="color: #92aa83;">2</span>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Het geeft iedereen een kans</h3>
            <p class="text-gray-700 leading-relaxed">
                Open Hiring biedt een toegankelijke manier om werk te vinden voor iedereen die wil werken. Geen gesprekken, geen tests, alleen jouw inzet telt.
            </p>
        </div>
        <div class="text-center">
            <span class="block mb-1 text-[12rem] font-extrabold" style="color: #92aa83;">3</span>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Snel en eerlijk</h3>
            <p class="text-gray-700 leading-relaxed">
                Geen onnodige vertragingen, maar een snelle instroom van nieuwe medewerkers. Dit versnelt niet alleen het proces, maar geeft ook meer vertrouwen aan werkzoekenden.
            </p>
        </div>
    </div>
</section>




<!-- Stories Section -->
<section class="py-12">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Verhalen van anderen</h2>
        <p class="text-gray-700 leading-relaxed mb-6">
            Lees inspirerende verhalen van mensen die via Open Hiring aan een baan zijn gekomen.
        </p>
        <button class="px-6 py-3 bg-[#B80063] text-white font-medium rounded-md shadow-md hover:bg-[#A00058] transition">
            Lees alle verhalen
        </button>
    </div>
</section>
<section class="py-12">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Verhalen van anderen</h2>
        <p class="text-gray-700 leading-relaxed mb-6">
            Lees inspirerende verhalen van mensen die via Open Hiring aan een baan zijn gekomen.
        </p>
        <button class="px-6 py-3 bg-[#B80063] text-white font-medium rounded-md shadow-md hover:bg-[#A00058] transition">
            Lees alle verhalen
        </button>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="overflow-hidden relative w-full">
            <!-- Carousel Wrapper -->
            <div id="story-carousel" class="flex gap-6 snap-x snap-mandatory">
                <!-- Card 1 -->
                <div class="flex-none bg-white rounded-lg shadow-md w-80 sm:w-96 h-auto sm:h-[500px] snap-center">
                    <div class="h-48 sm:h-56 rounded-t-lg overflow-hidden">
                        <img src="{{ asset('storage/images/hond1.jpeg') }}" alt="Verhaal 1" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 sm:p-6 pt-12">
                        <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-semibold mb-2">Werknemer</span>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Vrijheid om mezelf te zijn</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            "Ik was al lange tijd op zoek naar een nieuwe uitdaging, maar de traditionele sollicitaties gaven me altijd een ongemakkelijk gevoel."
                        </p>
                        <button class="text-blue-500 font-semibold">Lees het hele verhaal</button>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="flex-none bg-white rounded-lg shadow-md w-80 sm:w-96 h-auto sm:h-[500px] snap-center">
                    <div class="h-48 sm:h-56 rounded-t-lg overflow-hidden">
                        <img src="{{ asset('storage/images/hond2.jpeg') }}" alt="Verhaal 2" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 sm:p-6 pt-12">
                        <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-semibold mb-2">Werknemer</span>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Geen vooroordelen, alleen kansen</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            "De vrijheid om mezelf volledig te presenteren, zonder me zorgen te maken over de 'perceptie' van anderen."
                        </p>
                        <button class="text-blue-500 font-semibold">Lees het hele verhaal</button>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="flex-none bg-white rounded-lg shadow-md w-80 sm:w-96 h-auto sm:h-[500px] snap-center">
                    <div class="h-48 sm:h-56 rounded-t-lg overflow-hidden">
                        <img src="{{ asset('storage/images/hond3.jpeg') }}" alt="Verhaal 3" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 sm:p-6 pt-12">
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-semibold mb-2">Werkgever</span>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Meer diversiteit en betere matches</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            "Als bedrijf hechten we veel waarde aan diversiteit en gelijkheid, maar we merkten dat vooroordelen soms onbewust invloed hadden op ons selectieproces."
                        </p>
                        <button class="text-blue-500 font-semibold">Lees het hele verhaal</button>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="flex-none bg-white rounded-lg shadow-md w-80 sm:w-96 h-auto sm:h-[500px] snap-center">
                    <div class="h-48 sm:h-56 rounded-t-lg overflow-hidden">
                        <img src="{{ asset('storage/images/hond4.jpeg') }}" alt="Verhaal 4" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 sm:p-6 pt-12">
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-semibold mb-2">Werknemer</span>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Een eerlijke kans gegeven</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            "Als vrouw in de techindustrie had ik vaak het gevoel dat mijn cv niet dezelfde kans kreeg als dat van mijn mannelijke collega's."
                        </p>
                        <button class="text-blue-500 font-semibold">Lees het hele verhaal</button>
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="flex-none bg-white rounded-lg shadow-md w-80 sm:w-96 h-auto sm:h-[500px] snap-center">
                    <div class="h-48 sm:h-56 rounded-t-lg overflow-hidden">
                        <img src="{{ asset('storage/images/hond5.jpeg') }}" alt="Verhaal 5" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 sm:p-6 pt-12">
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-semibold mb-2">Werkgever</span>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Snel en eerlijk de juiste mensen vinden</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            "Als manager in een groot bedrijf was ik altijd op zoek naar manieren om onze wervingsprocessen eerlijker en inclusiever te maken."
                        </p>
                        <button class="text-blue-500 font-semibold">Lees het hele verhaal</button>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="absolute top-3 transform -translate-y-1/2 left-4">
                <button id="prev-btn" class="bg-gray-800 text-white p-2 rounded-full hover:bg-gray-700">
                    &lt;
                </button>
            </div>
            <div class="absolute top-3 transform -translate-y-1/2 right-4">
                <button id="next-btn" class="bg-gray-800 text-white p-2 rounded-full hover:bg-gray-700">
                    &gt;
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    const carousel = document.getElementById("story-carousel");
    const prevBtn = document.getElementById("prev-btn");
    const nextBtn = document.getElementById("next-btn");

    let currentIndex = 0;

    // Function to update the carousel
    function updateCarousel() {
        const cards = Array.from(carousel.children);
        const cardWidth = cards[0].offsetWidth + 24; // Gap between cards
        carousel.style.transform = `translateX(-${currentIndex * cardWidth}px)`; // Corrected the syntax here
    }

    prevBtn.addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    nextBtn.addEventListener("click", () => {
        const cards = Array.from(carousel.children);
        if (currentIndex < cards.length - 1) {
            currentIndex++;
            updateCarousel();
        }
    });

    // Initialize the carousel on load
    window.addEventListener('load', updateCarousel);
</script>






</body>
</html>
