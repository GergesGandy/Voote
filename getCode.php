<h2>
<?php

// this page only for developer to get forget password code without send email (when test without STMP)


session_start();
if (isset($_SESSION['resetPassCode'])) {
    require 'class/Rooting.php';
    $Root = new Root();

    $mail = $_SESSION['resetPassCode'];
    $code = $Root->m_Connection("SELECT resetpass FROM `adminv` WHERE email = '$mail'")->fetch();

    echo "Email: $mail <br><br>";
    echo 'Code: ' . $code['resetpass'];
}else {
    echo "Please enter email or valid email to print code in <a href='./forgot-password.php' target='_blank'>here</a>";
}
?>
</h2>
