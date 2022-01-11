// TOGGLE SHOWING DETAILS
const descriptions = document.querySelectorAll('.task-description');
const details = document.querySelector('.show-details'); // The button that says "show details"

details.addEventListener('click', toggleHidden);

function toggleHidden() {
  descriptions.forEach((description) => {
    description.classList.toggle('hidden');
  });
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
