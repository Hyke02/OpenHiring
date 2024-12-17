<script src="https://code.responsivevoice.org/responsivevoice.js?key=h2R8yjzX"></script>

<div class="flex items-center space-x-4 w-full pr-[1.5rem]">
    <button id="info-icon" class="z-20 m-[10px] group">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1" width="50" height="50">
            <circle cx="12" cy="12" r="10" stroke="currentColor" class="group-hover:stroke-[#AA0061]" />
            <line x1="12" y1="10" x2="12" y2="18" stroke="currentColor" stroke-width="1" class="group-hover:stroke-[#AA0061]" />
            <circle cx="12" cy="7" r="1" fill="currentColor" class="group-hover:stroke-[#AA0061]" />
            <span>Help</span>
        </svg>
    </button>

    @php
        $progressAmount = [
            'vacancy.index' => 'w-[25%]',
            'vacancy.show' => 'w-[50%]',
            'my-vacancy.index' => 'w-[75%]',
            'invitation.index' => 'w-[100%]',
        ];
        $currentProgress = $progressAmount[Route::currentRouteName()] ?? 'w-0';
    @endphp

    <div id="info-bar" class="relative w-full h-4 bg-gray-200 rounded-lg overflow-hidden">
        <div class="h-full bg-[#AA0061] transition-all duration-300 {{ $currentProgress }}"></div>
    </div>
</div>

<div id="info-box" class="fixed inset-0 bg-white text-2xl opacity-0 scale-y-0 transform origin-top transition-all duration-300 p-5 overflow-y-auto z-30">
    <div class="text-center">
        <h2 class="text-3xl font-bold mb-4">Zo solliciteer je</h2>
        <x-info-content-box>content</x-info-content-box>
        <button
            id="close-info"
            class="text-2xl bg-[#AA0061] text-white px-4 py-4 rounded-md shadow hover:bg-white hover:text-[#AA0061] hover:border-[#AA0061] border-2 border-transparent mt-5 w-full">
            terug
        </button>
        <button
            id="read-info"
            onclick="readContent()"
            class="text-2xl bg-[#AA0061] text-white px-4 py-4 rounded-md shadow hover:bg-white hover:text-[#AA0061] hover:border-[#AA0061] border-2 border-transparent mt-5 w-full">
            Lees voor
        </button>
    </div>
</div>

<script>
    const infoIcon = document.getElementById('info-icon')
    const infoBox = document.getElementById('info-box')
    const closeInfo = document.getElementById('close-info')

    infoIcon.addEventListener('click', () => {
        if (infoBox.classList.contains('opacity-0')) {
            infoBox.classList.remove('opacity-0', 'scale-y-0')
            infoBox.classList.add('opacity-100', 'scale-y-100')
        } else {
            infoBox.classList.remove('opacity-100', 'scale-y-100')
            infoBox.classList.add('opacity-0', 'scale-y-0')
        }
    })

    closeInfo.addEventListener('click', () => {
        infoBox.classList.remove('opacity-100', 'scale-y-100')
        infoBox.classList.add('opacity-0', 'scale-y-0')
    })

    function readContent() {
        const headings = document.querySelectorAll('#info-box h3')
        const listItems = document.querySelectorAll('#info-box li')

        let text = ''

        headings.forEach(heading => {
            text += heading.textContent + '. '
        })

        listItems.forEach(item => {
            text += item.textContent + '. '
        })

        if (text) {
            responsiveVoice.speak(text, "Dutch Male")
        }
    }
</script>


