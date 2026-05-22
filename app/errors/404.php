<?php require_once __DIR__ . '/../../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row vh-100 align-items-center justify-content-center">
        <div class="col-12">
          <div class="card shadow border-white px-5 py-4 custom-card">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h1 class="mb-0">404</h1>
              <button id="themeToggle" type="button" class="btn btn-outline-secondary btn-sm">Toggle Theme</button>
            </div>
            <div class="card-body">
              <p>The page you're looking for was not found.</p>
              <hr class="mb-5">   
              <a href="../../index.php" id="backBtn" class="btn">Go back</a>
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