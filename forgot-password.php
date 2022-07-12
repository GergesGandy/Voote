<?php
session_start();
if (isset($_SESSION['startUser'])){
    echo ("<script>window.location.href = 'DashboardQ.php'</script>");
    exit();

}
require 'class/handel.php';
$handel = new handel();

if (isset($_POST['mail']) and isset($_POST['login'])) { // check if *** e-mail *** is right 
  $mailReturn = $handel->h_resetPassword($_POST['mail']);
  // open session with right email to send email again with code
  if ($mailReturn == 'done') {
    $_SESSION['resetPassCode'] = $_POST['mail'];
  }
}elseif (isset($_POST['code']) and isset($_POST['login'])) { //check if *** code *** right
  $mailReturn = $handel->h_resetPassword($_SESSION['resetPassCode'], $_POST['code']);
  if ($mailReturn != 'done') { // if code wrong
    echo "<script>alert('$mailReturn');</script>";
    $mailReturn = 'done';
  }else{ // contenu if code right to reset password
    $user_Ok_To_Reset_Pass = 'reset Now';
  }
}elseif (isset($_SESSION['resetPassCode']) and isset($_POST['confNewPassword']) and isset($_POST['newPassword'])) {
  if ($handel->h_changePasswordOnReset($_SESSION['resetPassCode'], $_POST['newPassword'], $_POST['confNewPassword']) == 'done') {
    $myName = $handel->h_myName($_SESSION['resetPassCode']);
    echo "<script>alert('Thank you $myName, Now you can login with new password')</script>;";
    session_destroy();
    echo "<script>window.location.href = 'login.php'</script>;";
    exit();
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php $handel->h_getWord('projectName', 'e');echo ' | Reset password';?></title>
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
  <style>
    input[type=number] {
      -moz-appearance: textfield;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="assist/index2.html"><b><?php $handel->h_getWord('projectName', 'e'); ?></b>Project</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <form method="post"> 
  <?php if (!isset($user_Ok_To_Reset_Pass)){ if (!isset($mailReturn)) { session_destroy();?>
    <p class="login-box-msg">Enter your e-mail to reset password</p>
        <div class="input-group mb-3">
          <input type="email" name="mail" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?php } ?>
  <?php  if (isset($mailReturn)) { if ($mailReturn == 'done') {?>
    <p class="login-box-msg">Enter your security code reset password</p>
        <div class="input-group mb-3">
          <input type="number" name="code" class="form-control" placeholder="Enter reset code" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-fingerprint"></span>
            </div>
          </div>
        </div>
    <?php }else{session_destroy();
      ?>
    <p class="login-box-msg">Please Enter valid e-mail to reset your password</p>
        <div class="input-group mb-3">
          <input type="email" name="mail" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

      <?php
    }}}else{ ?> <!-- reset password screen if email and code right -->
        <p class="login-box-msg">Enter New Password</p>
        <div class="input-group mb-3">
          <input type="password" name="newPassword" class="form-control" placeholder="New Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="confNewPassword" class="form-control" placeholder="Conferm new password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-shield-alt"></span>
            </div>
          </div>
        </div>
    <?php } ?>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" id="login" class="btn btn-primary btn-block">Reset</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="login.php">Login to my account.</a>
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

<?php if (isset($user_Ok_To_Reset_Pass)){ ?>

<script>
  document.getElementById('login').disabled = true;
  function chackVal() {
    if ($("[name='newPassword']").val().length < 8){ 
        $("[name='newPassword']").addClass('is-invalid');
        $("[name='newPassword']").removeClass('is-valid');
        var passLength = 'false';
    }else {
        $("[name='newPassword']").removeClass('is-invalid');
        $("[name='newPassword']").addClass('is-valid');
        var passLength = 'true';
    }
    // check conferm password
    if ($("[name='confNewPassword']").val() === $("[name='newPassword']").val()) {
        $("[name='confNewPassword']").addClass('is-valid');
        $("[name='confNewPassword']").removeClass('is-invalid');
        var passConf = 'true';
    } else {
        $("[name='confNewPassword']").addClass('is-invalid');
        $("[name='confNewPassword']").removeClass('is-valid');
        var passConf = 'false';
    }
    // login button Disabled or enable
    if (passConf == 'true' && passLength == 'true') {
      document.getElementById('login').disabled = false;
    }else{
      document.getElementById('login').disabled = true;
    }
  }
$("[name='newPassword']").keyup(function(){
  chackVal();
});
$("[name='confNewPassword']").keyup(function(){
  chackVal();
});

</script>
<?php } ?>

</body>
</html>
