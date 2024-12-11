function confirmSubmit() {
    document.getElementById('applyModal').classList.remove('hidden');
    return false;
}

function closeModal() {
    document.getElementById('applyModal').classList.add('hidden');
}

function submitForm() {
    document.querySelector('form[onsubmit="return confirmSubmit()"]').submit();
}
