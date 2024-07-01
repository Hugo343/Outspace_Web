<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outspace</title>
    <link rel="icon" type="image/icon" href="/Logo Outspace - Copy.png">
    <link href="user/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script>
        window.onload = function() {
            const popup = document.getElementById('popup');
            if (popup && popup.textContent.trim() !== '') {
                const myModal = new bootstrap.Modal(document.getElementById('errorModal'), {
                    keyboard: false
                });
                myModal.show();
            }
        }
    </script>
</head>
<body>
    <?php
    $error = isset($_GET['error']) ? $_GET['error'] : '';
    if ($error) {
        echo "<div id='popup' class='popup'>$error</div>";
    }
    ?>
    <!-- Error Function-->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Error</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?php echo $error; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <div class="container">
    <div class="signin-signup">
      <form action="login.php" class="sign-in-form" method="POST">
        <h2 class="title">Sign In</h2>
        <div class="input-field">
          <i class="bi bi-person-fill"></i>
          <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-field">
          <i class="bi bi-lock-fill"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <input type="submit" name="signin" class="btn" value="Login">
        <p class="social-text">or Sign in with social platform</p>
        <div class="social-media">
          <a href="#" class="social-icon">
            <i class="bi bi-google"></i>
          </a>
          <a href="#" class="social-icon">
            <i class="bi bi-facebook"></i>
          </a>
        </div>
      </form>
      <form action="login.php" class="sign-up-form" method="post">
        <h2 class="title">Sign Up</h2>
        <div class="input-field">
          <input type="text" name="name" placeholder="Fullname" required>
        </div>
        <div class="input-field">
          <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-field">
          <input type="text" name="email" placeholder="Email" required>
        </div>
        <div class="input-field">
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="input-field">
          <input type="password" name="verify_password" placeholder="Verify your Password" required>
        </div>
        <input type="submit" name="signup" class="btn" value="Sign Up">
        <p class="social-text">or Sign up with social platform</p>
        <div class="social-media">
          <a href="#" class="social-icon">
            <i class="bi bi-google"></i>
          </a>
          <a href="#" class="social-icon">
            <i class="bi bi-facebook"></i>
          </a>
        </div>
      </form>
    </div>
    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>WELCOME TO OUTSPACE</h3>
          <button class="btn" id="sign-in-btn">sign in</button>
        </div>
        <img src="undraw_login_re_4vu2.svg" alt="" class="image">
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Register now and get 20% discount</h3>
          <button class="btn" id="sign-up-btn">sign up</button>
        </div>
        <img src="undraw_outer_space_re_u9vd.svg" alt="" class="image">
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="try.js"></script>
</body>
</html>
