<?php
$page = 'Questions';
include ('Class/handel.php');
$handel = new handel();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'MasterPage/head.php';
    if (!isset($_SESSION['GroupID'])) {
      header("Location: createGroup.php");
      exit();
    }
    $groupName = $handel->h_getGroupName();
    ?>
    
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
    <?php require 'MasterPage/navbar.php'?>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
    <?php require 'MasterPage/mainSlidebar.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 id="mainTitle">Questions at <strong><?php echo $groupName; ?></strong> Group </h4>
            <h4 id="secTitle" style="display: none;"></h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="createGroup.php">Groups</a></li>
              <li class="breadcrumb-item active"><?php echo $groupName; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-sm-12" id="newQues">
            <div class="position-relative bg-gray newQues" id="contentNew">
                <div class="ribbon-wrapper ribbon-lg" id="topCard">
                    <div class="ribbon bg-danger" id="titleNew">
                        New
                    </div>
                </div>
                <h1 id="textNew">Click to add first <br> question.
              </h1>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <?php require 'MasterPage/footer.php';?>

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Fullscreen mode css (start) -->
<div class="modal fade right" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog momodel modal-fluid" role="document">
        <div class="modal-content ">
            <div class=" modal-header text-center">
                <h4 class="modal-title w-100" id="exampleModalPreviewLabel">Go to <a href="mobile.php" id="linkTo" target="_blank"><span class="text-primary">
                <?php $handel->h_getWord('link', 'e'); ?></a></span> and enter: <span id="qID"></span></h4>
                <button  type="button" class="close" onclick="closeActive();" data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <h4 id="textOnProjector" style="text-align: center;margin-top: 3%;">No Question text :(</h4>
            <div class="modal-body" style="margin-top:6%" id="chartRealContent">
                
            </div>
            <div class="modal-footer">
              <div class="col-9" style="font-size: x-large;"><span id="countAnswers"></span> <i class="fas fa-user-plus"></i></div>
                <button type="button" class="btn btn-danger btn-md btn-rounded" onclick="closeActive();" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Fullscreen mode css (end) -->
<?php require 'MasterPage/scripts.php';?>
<script id="more"></script>

<!-- line charts -->
<script src="assist/plugins/flot-old/jquery.flot.js"></script>
<script src="assist/plugins/flot-old/jquery.flot.categories.js"></script>
<input type="text" disabled hidden id="hiddenVal" style="margin-left: 50%;">

</body>
</html>
