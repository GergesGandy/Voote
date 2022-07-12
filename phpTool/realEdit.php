<?php
if(isset($_POST['work'])){
    require '../Class/realTime.php';
    $realTime = new realTime();

    if (isset($_POST['snq']) and $_POST['work'] == 'EditQuestion'){
        if (isset($_POST['type']) and isset($_POST['text'])){
                echo $realTime->r_EditQuestion($_POST['snq'], $_POST['type'], $_POST['text']);
        }
    }elseif ($_POST['work'] == 'NewQuestion'){
        echo $realTime->r_NewQuestion();
    }
    if (isset($_POST['snq']) and isset($_POST['form']) and $_POST['work'] == 'EditForm'){
        echo $realTime->r_EditForm($_POST['snq'], $_POST['form']);
    }

    if (isset($_POST['snq']) and isset($_SESSION['startUser']) and $_POST['work'] == 'ChangeActive') {
        $realTime->r_ChangeActive($_POST['snq'], 'open');
    }

    if (isset($_POST['snq']) and isset($_SESSION['startUser']) and $_POST['work'] == 'closeActive') {
        $realTime->r_ChangeActive($_POST['snq'], 'close');
    }

    if (isset($_POST['snq']) and isset($_SESSION['startUser']) and $_POST['work'] == 'getStyle') {
        echo $realTime->r_ChartData($_POST['snq']);
    }
    if (isset($_POST['groupName']) and isset($_SESSION['startUser']) and $_POST['work'] == 'CreateGroup') {
        $_SESSION['GroupID'] = $realTime->h_createGroup($_POST['groupName']);
        echo $_SESSION['GroupID'];
    }
    if (isset($_POST['snq']) and $_POST['work'] == 'getGroupId') {
        echo $realTime->h_getGroupID($_POST['snq']);
    }
    if ($_POST['work'] == 'getGroupQuestions') {
        echo $realTime->h_getGroupQuestions();
    }
    if (isset($_POST['snq']) and $_POST['work'] == 'loadDataChangeQues') {
        echo $realTime->h_getQuectionTxt($_POST['snq']) . '•' .
        $realTime->h_getAnswers($_POST['snq']);
    }
    if (isset($_POST['snq']) and $_POST['work'] == 'checkAnswersChart') {
        echo $realTime->r_chackNewAnswersChart($_POST['snq']);
    }
    if (isset($_POST['oldPass']) and isset($_POST['newPass']) and $_POST['work'] == 'changePassword') {
        echo $realTime->h_changePassword($_POST['oldPass'], $_POST['newPass']);
    }
    if (isset($_POST['newName']) and $_POST['work'] == 'EditUserName') {
        echo $realTime->h_changeUserName($_POST['newName']);
    }
}