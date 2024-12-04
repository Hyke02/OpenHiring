<div class="flex relative">
    <div class="flex items-center m-[10px]">
        <x-nav-link href="{{ route('dashboard') }}">
            <img src="/storage/images/logo-oh.png" alt="Open hiring logo" class="h-[100px] w-[100px]">
        </x-nav-link>
    </div>

    <div class="burger ml-auto text-[90px]">
        ☰
    </div>

    <div class="dropdown opacity-0 scale-y-0 transform origin-top absolute left-0 right-0 top-full mt-2 bg-white min-h-screen transition-all duration-300">
        <nav class="text-center text-4xl">
            <x-nav-link href="/vacatures">Vacatures</x-nav-link>
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

