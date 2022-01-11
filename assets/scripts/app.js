// TOGGLE SHOWING DETAILS

// Variables
const descriptions = document.querySelectorAll('.task-description');
const showDetails = document.querySelector('.show-details'); // The button that says "show details"

// Eventlisteners
showDetails.addEventListener('click', toggleHidden);
showDetails.addEventListener('click', changeText);

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
