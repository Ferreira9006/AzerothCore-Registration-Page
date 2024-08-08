<?php require 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="row vh-100 align-items-center justify-content-center">
      <div class="col-12">
        <div class="card shadow border-white px-5 py-5" style="max-width: 50rem; margin: 0 auto;">
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

              <p class="mb-0"><small id="passwordCharsHelper" class="form-text">Minimum 8 characters, maximum 15 characters.</small></p>
              <p class="mb-0"><small id="mustContainHelper" class="form-text">At least one uppercase letter.</small></p>
              <p><small id="passwordMatchHelper" class="form-text">Your passwords must match.</small></p>

              <button type="submit" id="submit" class="btn btn-primary" disabled>Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/script.js"></script>
  </body>
</html>