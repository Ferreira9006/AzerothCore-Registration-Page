// Requirements
let validEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // Email regex
let validPassword = /^[a-zA-Z0-9]{8,15}$/; // Password regex
let validUsername = /^[a-zA-Z0-9]{8,15}$/; // Username regex
let mustContain = /[A-Z]/; // Must contain uppercase letter

// Get the helper elements
let usernameHelper = document.getElementById("usernameHelper"); // Username helper
let emailHelper = document.getElementById("emailHelper"); // Email helper
let passwordCharsHelper = document.getElementById("passwordCharsHelper"); // Password length helper
let mustContainHelper = document.getElementById("mustContainHelper"); // Must contain uppercase letter helper
let passwordMatchHelper = document.getElementById("passwordMatchHelper"); // Confirm password match helper

// Get the input elements
let inputUsername = document.getElementById('username');
let inputEmail = document.getElementById('email');
let inputPassword = document.getElementById('password');
let inputConfirmPassword = document.getElementById('passwordRepeat');
let submitButton = document.getElementById('submit'); // Submit button

// Flags to check if the fields have been touched
let usernameTouched = false;
let emailTouched = false;
let passwordTouched = false;
let confirmPasswordTouched = false;

// Function to validate the form
function validateForm() {
  let username = inputUsername.value;
  let email = inputEmail.value;
  let password = inputPassword.value;
  let confirmPassword = inputConfirmPassword.value;

  let isUsernameValid = validUsername.test(username);
  let isEmailValid = validEmail.test(email);
  let isPasswordLengthValid = validPassword.test(password);
  let isPasswordUppercaseValid = mustContain.test(password);
  let isPasswordMatchValid = password === confirmPassword;

  // Validate username
  if (usernameTouched) {
    if (!isUsernameValid) {
      usernameHelper.classList.add("text-danger");
      usernameHelper.innerHTML = "Username must be between 8 and 15 characters. Only letters and numbers are allowed!";
    } else {
      usernameHelper.classList.remove("text-danger");
      usernameHelper.innerHTML = "";
    }
  }

  // Validate email
  if (emailTouched) {
    if (!isEmailValid) {
      emailHelper.classList.add("text-danger");
      emailHelper.innerHTML = "Please enter a valid email address!";
    } else {
      emailHelper.classList.remove("text-danger");
      emailHelper.innerHTML = "";
    }
  }

  // Validate password length
  if (passwordTouched) {
    if (!isPasswordLengthValid) {
      passwordCharsHelper.classList.add("text-danger");
      passwordCharsHelper.classList.remove("text-success");
    } else {
      passwordCharsHelper.classList.remove("text-danger");
      passwordCharsHelper.classList.add("text-success");
    }

    // Must contain uppercase letter validation
    if (isPasswordUppercaseValid) {
      mustContainHelper.classList.remove("text-danger");
      mustContainHelper.classList.add("text-success");
    } else {
      mustContainHelper.classList.add("text-danger");
      mustContainHelper.classList.remove("text-success");
    }
  }

  // Confirm password match validation
  if (passwordTouched && confirmPasswordTouched) {
    if (isPasswordMatchValid) {
      passwordMatchHelper.classList.remove("text-danger");
      passwordMatchHelper.classList.add("text-success");
    } else {
      passwordMatchHelper.classList.add("text-danger");
      passwordMatchHelper.classList.remove("text-success");
    }
  }

  // Enable or disable the submit button
  submitButton.disabled = !(isUsernameValid && isEmailValid && isPasswordLengthValid && isPasswordUppercaseValid && isPasswordMatchValid);
}

// Validate username
if (inputUsername) {
  inputUsername.addEventListener('input', function () {
    usernameTouched = true;
    validateForm();
  });
}

// Validate email
if (inputEmail) {
  inputEmail.addEventListener('input', function () {
    emailTouched = true;
    validateForm();
  });
}

// Validate password and confirm password
if (inputPassword) {
  inputPassword.addEventListener('input', function () {
    passwordTouched = true;
    validateForm();
  });
}

if (inputConfirmPassword) {
  inputConfirmPassword.addEventListener('input', function () {
    confirmPasswordTouched = true;
    validateForm();
  });
}

// Initial validation call to set the button state correctly on page load
validateForm();