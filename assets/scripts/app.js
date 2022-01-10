// TOGGLE SHOWING DETAILS
const descriptions = document.querySelectorAll('.task-description');
const details = document.querySelector('.show-details');

details.addEventListener('click', () =>
  descriptions.forEach((description) => {
    if (description.style.display === 'none') {
      description.style.display = 'block';
    } else {
      description.style.display = 'none';
    }
  })
);

// Code below does not work, I don't understand why

// details.addEventListener('click', () =>
//   descriptions.forEach((description) => {
//     description.classList.toggle('show');
//   })
// );

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
