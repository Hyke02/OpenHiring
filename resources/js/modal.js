document.querySelector('.applybutton').addEventListener('click', () => {
    console.log('harro')
    document.getElementById('applyModal').classList.remove('hidden');
});

document.querySelector('.modalClose').addEventListener('click', (e) => {
    e.preventDefault()
    document.getElementById('applyModal').classList.add('hidden');
})


