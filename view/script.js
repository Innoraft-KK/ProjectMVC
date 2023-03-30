const form = document.querySelector('form');
const firstNameInput = document.querySelector('#fname');
const lastNameInput = document.querySelector('#lname');
const emailInput = document.querySelector('#email');
const phoneInput = document.querySelector('#phone');
const passwordInput = document.querySelector('#password');
const confirmpasswordInput = document.querySelector('#re-password');
form.addEventListener('submit', (event) => {
  event.preventDefault(); // prevent form submission
  // validate inputs
  const firstName = firstNameInput.value.trim();
  const lastName = lastNameInput.value.trim();
  const emailValue = emailInput.value;
  const passwordValue = passwordInput.value;
  const confirmpasswordValue = confirmpasswordInput.value;
  const firstNamePattern = /^[A-Za-z]+$/;
  const lastNamePattern = /^[A-Za-z]+$/;
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!firstNamePattern.test(firstName)) {
    alert('First name should contain only alphabets');
    firstNameInput.focus();
    return;
  }
  if (!lastNamePattern.test(lastName)) {
    alert('Last name should contain only alphabets');
    lastNameInput.focus();
    return;
  }
  if (!emailPattern.test(emailValue)) {
    alert('Enter a valid email id');
    emailInput.focus()
    return;
  }
  if (passwordValue!=confirmpasswordValue) {
    alert("Password and confirm password do not match!");
    passwordInput.focus()
    return;
  }
    // form is valid, submit it
    form.submit();
  });


