<div>
    <button id="info-icon">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" width="50" height="50">
            <circle cx="12" cy="12" r="10" />
            <line x1="12" y1="10" x2="12" y2="18" stroke="currentColor" stroke-width="1" />
            <circle cx="12" cy="7" r="1" fill="currentColor" />
        </svg>
    </button>

    <div id="info-box" class="text-2xl absolute opacity-0 scale-y-0 transform origin-top bg-white border rounded-lg shadow-md p-3 mt-2 transition-all duration-300">
        {{ $slot }}
    </div>
</div>

<script>
    document.getElementById('info-icon').addEventListener('click', () => {
        const infoBox = document.getElementById('info-box')

        if (infoBox.classList.contains('opacity-0')) {
            infoBox.classList.remove('opacity-0', 'scale-y-0')
            infoBox.classList.add('opacity-100', 'scale-y-100')
        } else {
            infoBox.classList.remove('opacity-100', 'scale-y-100')
            infoBox.classList.add('opacity-0', 'scale-y-0')
        }
    })
</script>


