<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtain and filter the inputs
    $username = filter_var($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = filter_var($_POST['password']);
    $passwordRepeat = filter_var($_POST['passwordRepeat']);

    // Validate min/max lengths
    if (strlen($username) < USERNAME_MIN_LENGTH || strlen($username) > USERNAME_MAX_LENGTH) {
      echo "<div class='alert alert-danger' role='alert'>Username must be between ".USERNAME_MIN_LENGTH." and ".USERNAME_MAX_LENGTH." characters.</div>";
      return;
    }
    if (strlen($password) < PASSWORD_MIN_LENGTH || strlen($password) > PASSWORD_MAX_LENGTH) {
      echo "<div class='alert alert-danger' role='alert'>Password must be between ".PASSWORD_MIN_LENGTH." and ".PASSWORD_MAX_LENGTH." characters.</div>";
      return;
    }
    if (strlen($email) > 255) {
      echo "<div class='alert alert-danger' role='alert'>Email must be at most 255 characters.</div>";
      return;
    }

    // Get the salt and verifier
    list($salt, $verifier) = SRP6::getRegistrationData(strtoupper($username), $password);

    // Convert the username and email to uppercase
    $username = strtoupper($username);
    $email = strtoupper($email);

    if (Auth::checkUsername($username)) {
      echo "<div class='alert alert-danger' role='alert'> The entered username already exists. </div>";
      return;
    }

    if (Auth::checkEmail($email)) {
      echo "<div class='alert alert-danger' role='alert'> The entered email is already in use. </div>";
      return;
    }

    if ($password !== $passwordRepeat) {
      echo "<div class='alert alert-danger' role='alert'> Passwords do not match. </div>";
      return;
    }

    if (Auth::Register($username, $email, $salt, $verifier)){
      echo "<div class='alert alert-success' role='alert'> Congratulations! Account <b>{$username}</b> was created. </div>";
      return;
    }
}