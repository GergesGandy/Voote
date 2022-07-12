<?php
session_start();
if (isset($_SESSION['startUser'])){
    echo ("<script>window.location.href = 'DashboardQ.php'</script>");
    exit();

}
require 'class/handel.php';
$handel = new handel();
if (isset($_POST['mail']) and isset($_POST['pass']) and isset($_POST['login'])){
    if (!empty($_POST['mail']) and !empty($_POST['pass'])){
        $error = $handel->h_LogIn($_POST['mail'], $_POST['pass']);
        if ($error == 'error'){
            echo '<div style="padding: 5px;background-color: indianred;border-radius: 20px;font-size: larger;color: beige;">Please check Username or Password </div>';
        }
    }else{
        echo '<div style="padding: 5px;background-color: indianred;border-radius: 20px;font-size: larger;color: beige;">Please insert valid data :(</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php $handel->h_getWord('projectName', 'e');echo ' | Login';?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="./assist/img/logo.png" type="image/png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assist/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assist/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assist/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b><?php $handel->h_getWord('projectName', 'e'); ?></b>Project</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" name="mail" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assist/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assist/dist/js/adminlte.min.js"></script>

</body>
</html>
