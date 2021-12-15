let deleteBlock = document.querySelector('.delete-profile');
let deleteButton = deleteBlock.querySelector('a');
let deleteConfirmation = deleteBlock.querySelector('.delete-confirmation');
let yesButton = deleteConfirmation.querySelector('.yes-btn');
let noButton = deleteConfirmation.querySelector('.no-btn');

deleteButton.onclick = function () {
    deleteConfirmation.classList.remove('hidden');
    deleteButton.classList.add('hidden');
}

noButton.onclick = function () {
    deleteConfirmation.classList.add('hidden');
    deleteButton.classList.remove('hidden');
}

yesButton.onclick = function () {
    window.location.href = 'DeleteProfile.php';
}