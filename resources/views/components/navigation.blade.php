<div class="flex relative p-6">
    <a href="{{ route('home') }}" class="w-16">
        <img src="{{ asset('storage/images/logo-oh.png') }}" alt="logo van open hiring" class="w-17 focus:border-indigo-600">
    </a>

    <div class="burger ml-auto text-[48px]">
        <img src="{{ asset('storage/images/burger-menu.svg') }}" alt="menu icoon" class="w-12" fill="currentcolor">
    </div>

    <div class="dropdown opacity-0 scale-y-0 transform origin-top absolute left-0 right-0 top-full
    mt-2 bg-white min-h-screen transition-all duration-300 pt-[20%]">
        <nav class="text-center text-4xl flex flex-col space-y-10">
            @auth()
                <x-nav-link href="/profile.index">Profiel</x-nav-link>
                <x-nav-link href="/my-vacancy">Mijn Vacatures</x-nav-link>
                <x-nav-link href="/vacancy">Vacatures</x-nav-link>
                <x-nav-link href="/help">Help</x-nav-link>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <x-nav-link href="javascript:void(0);" onclick="this.closest('form').submit();">Uitloggen</x-nav-link>
                </form>
            @else
                <x-nav-link href="/vacancy">Vacatures</x-nav-link>
                <x-nav-link href="/help">Help</x-nav-link>
                <x-nav-link href="/login">Inloggen</x-nav-link>
            @endauth
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

