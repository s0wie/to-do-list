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

// NEW
