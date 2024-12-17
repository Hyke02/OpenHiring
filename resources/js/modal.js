const modal = document.getElementById('modal');
const modalText = document.getElementById('modalText');
const modalForm = document.getElementById('modalForm');
const modalClose = document.querySelector('.modalClose');

document.querySelectorAll('.unapplyButton').forEach(button => {
    button.addEventListener('click', () => {
        console.log('hoi')

        const vacancyId = button.getAttribute('data-id');
        const vacancyName = button.getAttribute('data-name');
        const actionUrl = button    .getAttribute('data-url');

        console.log('harro')

        // Update modal text
        modalText.textContent = `Weet u zeker dat u zich wilt uitschrijven voor de vacature "${vacancyName}"?`;

        // Update form action dynamically
        modalForm.setAttribute('action', actionUrl);

        // Show the modal
        modal.classList.remove('hidden');
    })
})

modalClose.addEventListener('click', (e) => {
    console.log('harro')
    e.preventDefault()
    modal.classList.add('hidden');
})

window.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.add('hidden');
    }
});

document.querySelector('.applybutton').addEventListener('click', () => {
    console.log('harro')
    document.getElementById('modal').classList.remove('hidden');
});

