<!-- jQuery -->
<script src="assist/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assist/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assist/dist/js/demo.js"></script>
<script src="assist/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="assist/plugins/toastr/toastr.min.js"></script>
<?php
if ($page != 'Register' or $page == 'Mobile'){echo '<script src="assist/dist/js/voote.js"></script>';}
if ($page == 'Mobile'){echo '<script src="assist/dist/js/vooteMobile.js"></script>';}
?>
