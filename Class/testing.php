<?php

//require 'test.php';
require 'handel.php';


//echo $connect->snqGenerate();
//$connect->h_AddQuestion('qwert', 'Hello world!', '1', '2',
//    '', '', '1', '', '', '');

$pass = '123456789';
$ff = 'vO0te$' . $pass;
$password = md5($pass);
$hash = password_hash("$password", PASSWORD_DEFAULT);
echo 'Pass : ' . $pass . '<br>';
echo 'ff : ' . $ff . '<br>';
echo 'password : ' . $password . '<br>';
echo 'hash : ' . $hash . '<br>';

$MAC = exec('getmac');
session_start();
// Storing 'getmac' value in $MAC
$MAC = strtok($MAC, ' ');
echo $MAC;
$handel = new handel();

$handel->h_LogIn('Clook55@gmail.com', 1234567890);

if (isset($_SESSION['startUser'])){
    echo $_SESSION['startUser'];
}

session_destroy();

?>

<html lang="en">
<head>
    <title>Hello Test</title>
</head>
<body>

<div id="demo"></div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    function check() {
        $.ajax({
            url: 'test.php',
            method: 'POST',
            data: {
                snq: '1'
            },
            success: function (response) {

                if (document.getElementById("demo").innerHTML !== response)
                    document.getElementById("demo").innerHTML = response;
            }
        })
    }

    $(document).ready(function () {
        inter = setInterval("check()", 500);
    })
</script>
</body>
</html>
