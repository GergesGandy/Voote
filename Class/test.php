<?php
require 'Rooting.php';

class test extends Root {
    static function getActiveOne() {
        $data = (new Root)->m_Connection("SELECT * FROM `question` WHERE active = '1'")->fetch();
        return $data['a1'] . ' '  . $data['a2'] . ' ' .$data['a3'] . ' ' . $data['a4'];
    }
}


$test = new test();



if (isset($_POST['snq'])){

    if (!empty($test->getActiveOne())){
        echo $test->getActiveOne();
    }

}



$page = 'test';

?>


<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assist/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->

    <link rel="stylesheet" href="../assist/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="../assist/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="../assist/dist/css/voote.css">
</head>
<body>

<div class="row">
    <div class="col-6 text-center">
        <input type="text" class="knob" value="90" data-width="200" data-height="200" data-fgColor="#dc3545">
    </div>
    <div class="col-6 text-center">
        <input type="text" class="knob" value="70" data-width="200" data-height="200" data-fgColor="#39CCCC">
    </div>
</div>


<!--<button id="modalActivate" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalPreview">-->
<!--    Launch demo modal-->
<!--</button>-->
<!-- Modal -->
<!--<div class="modal fade right" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog momodel modal-fluid" role="document">-->
<!--        <div class="modal-content ">-->
<!--            <div class=" modal-header text-center">-->
<!--                <h5 class="modal-title w-100" id="exampleModalPreviewLabel">Material Design  Full Screen Modal</h5>-->
<!--                <button  type="button" class="close " data-dismiss="modal" aria-label="Close">-->
<!--                    <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!---->
<!--                <h1 class="section-heading text-center wow fadeIn my-5 pt-3"> Not for money, but for humanity</h1>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-danger btn-md btn-rounded" data-dismiss="modal">Close</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- jQuery -->
<script src="../assist/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assist/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assist/dist/js/demo.js"></script>
<script src="../assist/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="../assist/plugins/toastr/toastr.min.js"></script>
</body>
</html>

/* Fullscreen buttom */
<!---->
<!--<button id="modalActivate" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalPreview" style="-->
<!--    margin-top: 25%;-->
<!--">-->
<!--    <i class="fas fa-compress"></i>-->
<!--</button>-->
<!---->



