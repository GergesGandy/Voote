<?php
require '../Class/realTime.php';
$realTime = new realTime();

if (isset($_POST['work'])) {
    if (isset($_POST['group']) and $_POST['work'] == 'checkQuestion') {
        print_r( $realTime->r_CheckIfQActive($_POST['group']));
    }
    if (isset($_POST['id']) and $_POST['work'] == 'getQuestion') {
        echo $realTime->h_getQuectionTxt($_POST['id']);
    }
    if (isset($_POST['id']) and $_POST['work'] == 'getAnswersHtml') {
        echo $realTime->h_getAnswersHtml($_POST['id']);
    }
    if (isset($_POST['id']) and $_POST['work'] == 'getAnswers') {
        print_r($realTime->h_getAnswers($_POST['id']));
    }
    if ($_POST['work'] == 'getMac') {
        $MAC = exec('getmac');
        $MAC = strtok($MAC, ' ');
		if (empty($MAC)){
			$MAC = 	session_id();
		}
        $_SESSION['userMAC'] = $MAC;
        echo $MAC;
    }
    if (isset($_POST['answer']) and isset($_POST['id']) and $_POST['work'] == 'answer') {
        $realTime->h_AddAnswer($_POST['answer'], $_POST['id']);
    }
}
