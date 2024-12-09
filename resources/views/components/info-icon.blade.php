<div class="">
    <button id="info-icon" class="z-10 m-[10px]">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" width="50" height="50">
            <circle cx="12" cy="12" r="10" />
            <line x1="12" y1="10" x2="12" y2="18" stroke="currentColor" stroke-width="1" />
            <circle cx="12" cy="7" r="1" fill="currentColor" />
        </svg>
    </button>

    <div id="info-box" class="fixed inset-0 bg-white text-2xl opacity-0 scale-y-0 transform origin-top transition-all duration-300 p-5 overflow-y-auto">
        <div class="text-center">
            <h2 class="text-5xl font-bold mb-4">Zo solliciteer je</h2>
            <x-info-content-box>content</x-info-content-box>
            <button id="close-info" class="text-3xl bg-[#AA0061] text-white px-4 py-4 rounded-md shadow hover:bg-[#AA0061] mt-5 w-full">
                sluit
            </button>
        </div>
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
    });

    closeInfo.addEventListener('click', () => {
        infoBox.classList.remove('opacity-100', 'scale-y-100')
        infoBox.classList.add('opacity-0', 'scale-y-0')
    });
</script>



