<?php
$page = 'Mobile';
include ('Class/handel.php');
$handel = new handel();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'MasterPage/head.php';
    if (isset($_GET['GroupId'])) {
      $_GET['GroupId'] = str_replace(' ', '', $_GET['GroupId']);
      $groupId = $_GET['GroupId'];
      echo $handel->h_checkIfGroupValid($groupId);
      $_SESSION['GroupID'] = $groupId;
      echo "<script> GroupID = '$groupId';</script>";
    }else {
      echo "<script> GroupID = '';</script>";
    }
    ?>
    <style>
        .sidebar-mini.sidebar-collapse .content-wrapper,
         .sidebar-mini.sidebar-collapse .main-footer,
          .sidebar-mini.sidebar-collapse .main-header{
            margin: 0 !important;
        }
        .loader {
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin-right: 20px;
            animation: spin 2s linear infinite;
            }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
            }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
    <?php require 'MasterPage/navbar.php'?>
  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left:0px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2" style="text-align: center;">
          <div class="col-sm-12">
            <h1 id="question" style="display: inline-flex;"><div class="loader"></div>  Please Wait to active question</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" id="answers">
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <?php require 'MasterPage/footer.php';?>

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<?php require 'MasterPage/scripts.php';?>
<script id="more"></script>
<?php

if (!isset($_SESSION['userMAC'])) {
  echo "<script>$.ajax({
    url: 'phpTool/mobileReal.php',
    method: 'POST',
    data: {
        work: 'getMac'
    },
    success: function (response) {
      console.log(response);
    }
})</script>";
}


if (!isset($_GET['GroupId'])) {
  echo "<script>setTimeout(function() {clearInterval(check);
  document.getElementById('question').innerHTML = '<i class=\"fas fa-exclamation-triangle text-yellow\"></i>Please enter Group id';
}, 2000);</script>";
}
?>
</body>
</html>
