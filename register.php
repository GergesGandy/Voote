<?php
$page = 'Register';
include ('Class/handel.php');
$handel = new handel();
if (isset($_POST['name']) and isset($_POST['email'])
    and isset($_POST['pass']) and isset($_POST['confPass'])){
    $created = $handel->h_CreateAdmin($_POST['name'], $_POST['email'], $_POST['pass'], $_POST['confPass']);
    if ($created == 'done'){
        echo "<script>alert('Thank you! Login to Voote now'); window.location.href = 'login.php'</script>";
    }else{
        echo "<script>alert('$created');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'MasterPage/head.php';
    if (isset($_SESSION['startUser'])){
        header('Location: DashboardQ.php');
    }
    ?>

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b><?php $handel->h_getWord('projectName', 'e');?></b>Project</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass" class="form-control" minlength="8" title="Minlength is 8 character" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="confPass" class="form-control" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required checked>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<?php require 'MasterPage/scripts.php';?>
<script>
    $(document).ready(function(){
        $("[name='pass']").keyup(function(){
            if ($("[name='pass']").val().length < 8){
                $("[name='pass']").addClass('is-invalid');
                $("[name='pass']").removeClass('is-valid');
            }else {
                $("[name='pass']").removeClass('is-invalid');
                $("[name='pass']").addClass('is-valid');
            }
            chackVal();
        });
        $("[name='confPass']").keyup(function(){
            chackVal();
        });
    });
    function chackVal() {
        if ($("[name='confPass']").val() === $("[name='pass']").val()) {
            $("[name='confPass']").addClass('is-valid');
            $("[name='confPass']").removeClass('is-invalid');
        } else {
            $("[name='confPass']").addClass('is-invalid');
            $("[name='confPass']").removeClass('is-valid');
        }
    }
</script>
</body>
</html>
