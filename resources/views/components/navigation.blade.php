<div class="flex items-center relative p-6 sticky top-0 z-50 lg:mx-10 lg:h-fit lg:py-3
bg-[#FBFCF778] shadow-[0_-6px_30px_rgba(0,0,0,0.1)] backdrop-blur-[16px] border border-[rgba(244,251,216,0.28)]">
    <a href="{{ route('home') }}" >
        <img src="{{ asset('storage/images/logo-oh.png') }}" alt="logo van open hiring" class="w-12 focus:border-indigo-600">
    </a>

    <div class="burger ml-auto text-[48px]">
        <img src="{{ asset('storage/images/burger-menu.svg') }}" alt="menu icoon" class="w-12 lg:w-6">
    </div>

    <!-- Dropdown -->
    <div class="dropdown opacity-0 scale-y-0 transform origin-top absolute left-0 right-0 top-full
    bg-[#FBFCF7] h-[calc(100vh-96px)] overflow-y-auto transition-all duration-300 pb-[20%] pt-[5%]">
        <nav class="text-center text-4xl flex flex-col space-y-10">
            @auth()
                <x-nav-link href="{{ route('profile.index') }}">Profiel</x-nav-link>
                <x-nav-link href="/my-vacancy">Mijn Vacatures</x-nav-link>
                <x-nav-link href="/vacancy">Vacatures</x-nav-link>
                <x-nav-link href="/help">Help</x-nav-link>
                <x-nav-link href="#" id="logout-btn">Logout</x-nav-link>
                <x-language-selector></x-language-selector>
            @else
                <x-nav-link href="/vacancy">Vacatures</x-nav-link>
                <x-nav-link href="/help">Hulp nodig</x-nav-link>
                <x-nav-link href="/login">Inloggen</x-nav-link>
                <x-language-selector></x-language-selector>
            @endauth
        </nav>
    </div>
</div>




<div id="logout-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white p-6 rounded-lg w-full mx-4 relative text-center">
        <h2 class="text-xl mb-4">Weet je zeker dat je uit wil loggen?</h2>
        <div class="flex justify-between">
            <button id="confirm-logout" class="bg-[#AA0061] text-white mx-2 py-2 px-4 rounded-full">Bevestigen</button>
            <button id="cancel-btn" class="modalClose bg-gray-400 text-white mx-2 py-2 px-4 rounded-full mr-2">Annuleren</button>
{{--            <button id="cancel-btn" class="px-4 py-2 bg-gray-300 rounded-full">Cancel</button>--}}
{{--            <button id="confirm-logout" class="px-4 py-2 bg-red-500 text-white rounded">Logout</button>--}}
        </div>
    </div>
</div>



<script>
    document.querySelector('.burger').addEventListener('click', () => {
        const dropdown = document.querySelector('.dropdown')
        const infoBar = document.getElementById('info-bar')
        const infoIcon = document.getElementById('info-icon')

        if (dropdown.classList.contains('opacity-0')) {
            dropdown.classList.remove('opacity-0', 'scale-y-0')
            dropdown.classList.add('opacity-100', 'scale-y-100')

            if (infoBar) {
                infoBar.classList.add('opacity-0', 'scale-y-0')
            }
            if (infoIcon) {
                infoIcon.classList.add('invisible')
            }
        } else {
            dropdown.classList.remove('opacity-100', 'scale-y-100')
            dropdown.classList.add('opacity-0', 'scale-y-0')

            if (infoBar) {
                infoBar.classList.remove('opacity-0', 'scale-y-0')
            }
            if (infoIcon) {
                infoIcon.classList.remove('invisible')
            }
        }
    })


    document.querySelector('#logout-btn').addEventListener('click', (e) => {
        e.preventDefault()
        document.querySelector('#logout-modal').classList.remove('hidden')
    })

    document.querySelector('#cancel-btn').addEventListener('click', () => {
        document.querySelector('#logout-modal').classList.add('hidden')
    })

    document.querySelector('#confirm-logout').addEventListener('click', () => {
        document.querySelector('#logout-form').submit()
    })

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            document.querySelector('#logout-modal').classList.add('hidden')
        }
    })
</script>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

