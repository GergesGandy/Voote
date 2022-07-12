<?php
session_start();
if (!isset($_SESSION['startUser']) and $page != 'Register' and $page != 'Mobile'){
        header('Location: login.php');
        exit();
}
//@$handel->h_checkAdmin($_SESSION['startUser']);
?>
<meta charset="utf-8">
<link rel="icon" href="./assist/img/logo.png" type="image/png">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php $handel->h_getWord('projectName', 'e'); echo ' | ' . $page;?></title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Font Awesome -->
<link rel="stylesheet" href="assist/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- overlayScrollbars -->

<link rel="stylesheet" href="assist/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="assist/plugins/toastr/toastr.min.css">
<?php if($page == 'Mobile'){echo '<link rel="stylesheet" href="assist/plugins/toastr/toastr.min.css">';} ?>
<link rel="stylesheet" href="assist/dist/css/voote.css">
