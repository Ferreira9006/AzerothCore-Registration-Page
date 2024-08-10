<?php require 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row vh-100 align-items-center justify-content-center">
        <div class="col-12">
          <div class="card shadow border-white px-5 py-4 custom-card">
            <div class="card-body">
              <h1><?= $slogan ?></h1>
              <p><?= $description ?></p>
              <hr class="mb-5">

              <?php include 'app/register.php' ?>
              <form action="" method="post">
                <div class="form-group row mb-3">
                  <label for="username" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username" maxlength="15" required>
                    <small id="usernameHelper"></small>
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <label for="email" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" required>
                    <small id="emailHelper"></small>
                  </div>
                </div>

                <div class="form-group row mb-3">
                  <label for="password" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" required>
                  </div>
                </div>

                <div class="form-group row mb-3">
                  <label for="passwordRepeat" class="col-sm-3 col-form-label">Confirm Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="passwordRepeat" name="passwordRepeat" required>
                  </div>
                </div>

                <p class="mb-0"><small id="passwordCharsHelper" class="form-text">Minimum 8 characters, maximum 15 characters. No special characters allowed.</small></p>
                <p class="mb-0"><small id="mustContainHelper" class="form-text">At least one uppercase letter.</small></p>
                <p><small id="passwordMatchHelper" class="form-text">Your passwords must match.</small></p>

                <button type="submit" id="submit" class="btn btn-primary float-end" disabled>Register</button>
              </form>
            </div>
            <small class="text-center">
              Made with 
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
              </svg> 
              by <a href="https://github.com/Ferreira9006">Gabriel Ferreira</a>
            </small>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/script.js"></script>
  </body>
</html>