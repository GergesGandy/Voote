<?php
if (isset($_POST['go'])) {
  session_start();
  $_SESSION['GroupID'] = $_POST['selectgroup'];
  header("Location: DashboardQ.php");
  exit();
}
$page = 'Create Group';
include ('Class/handel.php');
$handel = new handel();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'MasterPage/head.php';?>
    <style>
        .sidebar-mini.sidebar-collapse .content-wrapper,
         .sidebar-mini.sidebar-collapse .main-footer,
          .sidebar-mini.sidebar-collapse .main-header{
            margin: 0 !important;
        }
        nav, footer {
          margin-left: 0px !important;
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
    <link rel="stylesheet" href="assist/dist/css/select2.min.css">

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
        <!-- Choose group name -->
        <form action="createGroup.php" method="post">
          <div class="row" style="text-align: center;">
            <div class="col-md-6" data-select2-id="13">
                <div class="form-group">
                  <label>Choose group</label>
                  <select class="form-control select2 select2-hidden-accessible" name="selectgroup"  style="width: 100%;" data-select2-id="4" tabindex="-1" aria-hidden="true">
                    <?php echo $handel->h_getGroupsName(); ?>
                  </select>
                <input type="submit" name="go" style="margin-top: 10px;"class="btn btn-danger" value="GO">
                </div>
            </div>
          </form>
          <div class="col-md-6">
            <div class="form-group">
              <label>Create new group</label>
              <div class="input-group">
              <input type="text" class="form-control" id="createName">
                  <div class="input-group-btn">
                    <button type="button" id="createG" class="btn btn-danger">Create</button>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <?php require 'MasterPage/footer.php';?>

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<?php require 'MasterPage/scripts.php';?>
<script id="more"></script>

<script src="assist/dist/js/select2.full.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
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

?>

</body>
</html>
