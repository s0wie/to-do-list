// TOGGLE SHOWING DETAILS

// Variables
const descriptions = document.querySelectorAll('.task-description');
const showDetails = document.querySelector('.show-details'); // The button that says "show details"
const createNoteForm = document.querySelector('.create-list-form');
const createNoteButton = document.querySelector('.create-list-button');

// Eventlisteners
showDetails.addEventListener('click', toggleHidden);
showDetails.addEventListener('click', changeText);
createNoteButton.addEventListener('click', showNoteForm);

// Functions
function toggleHidden() {
  descriptions.forEach((description) => {
    description.classList.toggle('hidden');
  });
}

function changeText() {
  if (showDetails.textContent === 'show details') {
    showDetails.textContent = 'hide details';
  } else {
    showDetails.textContent = 'show details';
  }
}

function showNoteForm() {
  createNoteForm.classList.toggle('hidden');
}

// ADD TASK BY DOUBLE CLICKING CARD DOES NOT WORK EITHER
// const cards = document.querySelectorAll('.card');
// const forms = document.querySelectorAll('.add-task-form');

// // cards.forEach((card) => {
// //   card.addEventListener('dblclick', submitForm);
// // });

// function submitForm() {
// forms.forEach((form) => {
//   form.submit();
// });
//
// }
