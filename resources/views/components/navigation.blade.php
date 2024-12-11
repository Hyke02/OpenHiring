<div class="flex relative p-6">
    <a href="{{ route('home') }}" class="w-16">
        <img src="{{ asset('storage/images/logo-oh.png') }}" alt="logo van open hiring" class="w-17 focus:border-indigo-600">
    </a>

    <div class="burger ml-auto text-[48px]">
        <img src="{{ asset('storage/images/burger-menu.svg') }}" alt="menu icoon" class="w-12" fill="currentcolor">
    </div>

    <div class="dropdown opacity-0 scale-y-0 transform origin-top absolute left-0 right-0 top-full mt-4
                bg-white shadow-lg rounded-lg min-h-[70vh] w-full max-w-full mx-0 transition-all duration-300 pt-[15%] z-40">
        <nav class="text-center text-3xl flex flex-col space-y-6 p-8">
            <x-nav-link href="/profiel">Profiel</x-nav-link>
            <x-nav-link href="/mijn-vacatures">Mijn Vacatures</x-nav-link>
            <x-nav-link href="/vacatures">Vacatures</x-nav-link>
            <x-nav-link href="/login">Inloggen</x-nav-link>
            <x-nav-link href="/help">Help</x-nav-link>
        </nav>
    </div>
</div>

<script>
    document.querySelector('.burger').addEventListener('click', () => {
        const dropdown = document.querySelector('.dropdown');

        if (dropdown.classList.contains('opacity-0')) {
            dropdown.classList.remove('opacity-0', 'scale-y-0');
            dropdown.classList.add('opacity-100', 'scale-y-100');
        } else {
            dropdown.classList.remove('opacity-100', 'scale-y-100');
            dropdown.classList.add('opacity-0', 'scale-y-0');
        }
    });
</script>
