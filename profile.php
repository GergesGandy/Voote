<?php
$page = 'profile';
include ('Class/handel.php');
$handel = new handel();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'MasterPage/head.php';
    ?>
    <style>
      .card{
        margin: auto; 
      }
      .none-d{
        display: none !important;
      }
    </style>
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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="createGroup.php">Profile</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<form method="post" enctype="multipart/form-data">
    <!-- Main content -->
    <section class="content">
        <div class="col-sm-12" style="display: inline-flex;">
          <div class="card p-5 col-sm-5">
              <div class="box-body box-profile">
                <label class="col-lg-12" style="text-align: center;">
                    <input id="uploadedfile" name="uploadedfile" type="file" class="file" accept="image/*" hidden required oninvalid="alert('Please choose valid image');">
                    <img id="userImage" style="height: 120px;width: 120px;" class="profile-user-img img-responsive img-circle" src="<?php echo $handel->h_imagePath(); ?>" alt="User profile picture" id="proimag">
                </label>
                <h3 id="userName" class="profile-username text-center"><?php echo $handel->h_myName($_SESSION['startUser']);?></h3>
                <h3 id="changeName"  class="profile-username text-center none-d"><input id="nameInput" type="text" value="<?php echo $handel->h_myName($_SESSION['startUser']);?>"></h3>

                <p class="text-muted text-center">Click on image or data to edit</p>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>E-mail: </b> <a class="pull-right"><?php echo $_SESSION['startUser'];?></a>
                  </li>
                  <li class="list-group-item" data-toggle="modal" data-target="#exampleModalCenter">
                    <b>Password: </b> <a class="pull-right">*******</a>
                  </li>
                </ul>
                <input type="submit" class="btn btn-primary btn-block" value="Change Picture" style="font-weight: bold;">
              </div>
              <!-- /.box-body -->
            </div>

          </div>
    </section>
  </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <?php require 'MasterPage/footer.php';?>

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<?php require 'MasterPage/scripts.php';?>
<script id="more"></script>

<!-- line charts -->
<script src="assist/plugins/flot-old/jquery.flot.js"></script>
<script src="assist/plugins/flot-old/jquery.flot.categories.js"></script>

<script>
  var uploadField = document.getElementById("uploadedfile");

  uploadField.onchange = function() {
      if(this.files[0].size > 2097152){
        alert("File is too big!");
        this.value = "";
      };
  };
</script>
</body>
</html>


<?php
if (isset($_FILES["uploadedfile"]) ) {
  echo $_FILES["uploadedfile"]['size'];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["uploadedfile"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["uploadedfile"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
    $id = $handel->h_myID();
    $file_name = $_FILES['uploadedfile']['name'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $file_tmp = $_FILES['uploadedfile']['tmp_name'];
    $file_name = $id.'.'.$ext;
    move_uploaded_file($file_tmp,"userUploadImage/".$file_name);
    $handel->h_changeImage($file_name);
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

?>