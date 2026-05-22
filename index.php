<?php
require 'config.php';
try {
  // Checks if the DB info is correct / accessible.
  $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  // Redirect to db_error.php with error details and blank the page
  $query = http_build_query([
    'error_message' => $e->getMessage(),
    'error_code' => $e->getCode()
  ]);
  header('Location: app/errors/db_error.php?' . $query);
  exit();
}
?>

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
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h1 class="mb-0"><?= $slogan ?></h1>
                <button id="themeToggle" type="button" class="btn btn-outline-secondary btn-sm">Toggle Theme</button>
              </div>
              <p><?= $description ?></p>
              <hr class="mb-5">

              <?php include 'app/controllers/register.php' ?>
              <form action="" method="post">
                <div class="form-group row mb-3">
                  <label for="username" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username" maxlength="<?= USERNAME_MAX_LENGTH ?>" minlength="<?= USERNAME_MIN_LENGTH ?>" required>
                    <div id="usernameHelper" class="form-text"></div>
                  </div>
                </div>
                <?php if (EMAIL_ENABLED): ?>
                <div class="form-group row mb-3">
                  <label for="email" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" maxlength="255" required>
                    <div id="emailHelper" class="form-text"></div>
                  </div>
                </div>
                <?php endif; ?>

                <div class="form-group row mb-3">
                  <label for="password" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" maxlength="<?= PASSWORD_MAX_LENGTH ?>" minlength="<?= PASSWORD_MIN_LENGTH ?>" required>
                    <div id="passwordCharsHelper" class="form-text"></div>
                  </div>
                </div>

                <div class="form-group row mb-3">
                  <label for="passwordRepeat" class="col-sm-3 col-form-label">Confirm Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="passwordRepeat" name="passwordRepeat" required>
                    <div id="passwordMatchHelper" class="form-text"></div>
                  </div>
                </div>

                <div class="alert alert-info mt-3" role="alert">
                  <ul class="mb-0">
                    <li>Username: <?= USERNAME_MIN_LENGTH ?>-<?= USERNAME_MAX_LENGTH ?> characters.</li>
                    <?php if (EMAIL_ENABLED): ?>
                    <li>Email: up to 255 characters, must be valid format.</li>
                    <?php endif; ?>
                    <li>Password: <?= PASSWORD_MIN_LENGTH ?>-<?= PASSWORD_MAX_LENGTH ?> characters.</li>
                    <li>Passwords must match.</li>
                  </ul>
                </div>

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
    <script>
      const USERNAME_MIN_LENGTH = <?= USERNAME_MIN_LENGTH ?>;
      const USERNAME_MAX_LENGTH = <?= USERNAME_MAX_LENGTH ?>;
      const PASSWORD_MIN_LENGTH = <?= PASSWORD_MIN_LENGTH ?>;
      const PASSWORD_MAX_LENGTH = <?= PASSWORD_MAX_LENGTH ?>;
      const EMAIL_ENABLED = <?= EMAIL_ENABLED ? 'true' : 'false' ?>;
    </script>
    <script src="assets/js/script.js"></script>
    <script>
      // Theme logic
      const DEFAULT_THEME = "<?= strtolower(DEFAULT_THEME) ?>";
      function setTheme(theme) {
        if (theme === 'dark') {
          document.body.classList.add('dark-mode');
          document.body.classList.remove('light-mode');
        } else {
          document.body.classList.add('light-mode');
          document.body.classList.remove('dark-mode');
        }
        localStorage.setItem('theme', theme);
      }
      function getTheme() {
        return localStorage.getItem('theme') || DEFAULT_THEME;
      }
      document.addEventListener('DOMContentLoaded', function() {
        setTheme(getTheme());
        document.getElementById('themeToggle').addEventListener('click', function() {
          const current = getTheme();
          setTheme(current === 'dark' ? 'light' : 'dark');
        });
      });
    </script>
  </body>
</html>