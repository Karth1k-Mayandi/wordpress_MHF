jQuery(document).ready(() => {
  const checkboxes = document.querySelectorAll('input[value]');
  checkboxes.forEach((checkbox) => {
    checkbox.checked = checkbox.value === 'true';
  });
});
