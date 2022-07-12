<?php
require 'Rooting.php';

class handel extends Root{
    protected function bye(){
        header('Location: DashboardQ.php');
        exit();
    }

    public function h_LogIn($userName, $password){
        $getEmail = $this->m_Connection("SELECT pass FROM adminv WHERE email = '$userName';")->fetch();
        if (!empty($getEmail)) {
            if (password_verify("Voot@2O2o" . md5($password), $getEmail['pass'])) {
                $_SESSION['startUser'] = $userName;
                header('Location: DashboardQ.php');
            } else {
                return 'error';
            }
        } else {
            return 'error';
        }
    }

    public function h_checkAdmin($session){
        $query = $this->m_Connection("SELECT count(id) FROM `adminv` WHERE email = '$session';")->fetch();
        //if ($query['count(id)'] != 0){return true;}else{return false;$this->bye();}
    }

    public function h_CreateAdmin($fName, $email, $pass, $passConferm){
        $fName = $this->hf_editEntry($fName, 'tag', 'Ucf');
        $email = $this->hf_editEntry($email, 'tag', 'Ucf');
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $countEmail = $this->m_Connection("SELECT count('id') FROM adminv WHERE email = '$email';")->fetch();
            if ($countEmail["count('id')"] != 0) {
                return ("$email : is in already used");
            } else {
                if ($pass === $passConferm) {
                    $pass = password_hash("Voot@2O2o" . md5($pass), PASSWORD_DEFAULT); #2020 is o not zero and first o ia capital
                    $this->m_Connection("INSERT INTO `adminv` VALUES (NULL, '$fName', '$email', '$pass', 'assist/dist/img/avatar5.png', NULL);");
                    @$this->hf_sendEmail($email, 'Thank you for registration');
                    return 'done';
                } else {
                    return ("Password does not match");
                }
            }
        } else {
            return ("$email :is not a valid email address");
        }
    }

    private function snqGenerate(){
        $check = substr(str_shuffle(str_repeat('1234567890', 9)), 0, 9);
        $checkSQL = $this->m_Connection("SELECT id FROM question WHERE snq = '$check'");
        while ($checkSQL->rowCount() != 0) {
            $check = substr(str_shuffle(str_repeat('1234567890', 9)), 0, 9);
            $checkSQL = $this->m_Connection("SELECT id FROM question WHERE snq = '$check'");
        }
        return $check;
    }

    public function h_AddQuestion($snp, $Question, $a1, $a2, $a3, $a4, $active, $timer, $type, $slideForm){
        $snqCode = $this->snqGenerate();
        $this->m_Connection("INSERT INTO `question` VALUES (NULL, '$snqCode', '$snp', '$Question', '$a1', '$a2', '$a3', '$a4', '$active')");
    }

    public function h_CheckIfAnswer($MAC, $snq){
        // if user not answer function return true
        $check = $this->m_Connection("SELECT count(mac) FROM answer WHERE mac = '$MAC' and snq = '$snq'")->fetch();
        if ($check['count(mac)'] == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function h_AddAnswer($answer, $snq){
        if (isset($_SESSION['userMAC'])) {
            $mac = $_SESSION['userMAC'];
            $this->m_Connection("INSERT INTO `answer` (`snq`, `answer`, `mac`) VALUES ('$snq', '$answer', '$mac');");
        }
    }

    public function h_idGenerate(){
        $check = substr(str_shuffle(str_repeat('1234567890', 9)), 0, 9);
        $checkSQL = $this->m_Connection("SELECT id FROM question WHERE id = '$check'");
        while ($checkSQL->rowCount() != 0) {
            $check = substr(str_shuffle(str_repeat('1234567890', 9)), 0, 9);
            $checkSQL = $this->m_Connection("SELECT id FROM question WHERE id = '$check'");
        }
        return $check;
    }

    public function h_getWord($wordID, $type){
        $query =  $this->m_Connection("SELECT text FROM words WHERE wordid = '$wordID';")->fetch();
        if ($type == 'e') {
            echo $query['text'];
        }
        if ($type == 'r') {
            return $query['text'];
        }
    }

    public function h_myID(){
        $sessionEmail = $_SESSION['startUser'];
        $getID = $this->m_Connection("SELECT id FROM adminv WHERE email = '$sessionEmail';")->fetch();
        return $getID['id'];
    }

    public function h_myName($sessionEmail){
        $getID = $this->m_Connection("SELECT fname FROM adminv WHERE email = '$sessionEmail';")->fetch();
        return $getID['fname'];
    }

    public function h_getQuectionTxt($snq){
        $txt = $this->m_Connection("SELECT question FROM question WHERE id = '$snq'")->fetch();
        return $txt['question'];
    }

    public function h_getAnswersHtml($snq){
        $Html = $this->m_Connection("SELECT formstyle.mobile
        FROM question
        LEFT JOIN formstyle
        ON question.id = '$snq'
        WHERE question.form = formstyle.id;")->fetch();
        return $Html['mobile'];
    }

    public function h_getAnswers($snq){
        $txt = $this->m_Connection("SELECT a1, a2, a3, a4 FROM question WHERE id = '$snq'")->fetch();
        #alt + 7  = •
        return $txt['a1'] . '•' . $txt['a2'] . '•' . $txt['a3'] . '•' . $txt['a4'];
    }

    public function h_createGroup($groupName){
        if (isset($_SESSION['startUser'])) {
            $id = $this->h_GroupIdGenerate();
            $userID = $this->h_myID();
            $this->m_Connection("INSERT INTO `groups` (`groupid`, `name`, `snp`) VALUES ('$id', '$groupName', '$userID');");
            return $id;
        }
    }

    public function h_GroupIdGenerate(){
        $check = substr(str_shuffle(str_repeat('1234567890', 9)), 0, 9);
        $checkSQL = $this->m_Connection("SELECT groupid FROM groups WHERE groupid = '$check'");
        while ($checkSQL->rowCount() != 0) {
            $check = substr(str_shuffle(str_repeat('1234567890', 9)), 0, 9);
            $checkSQL = $this->m_Connection("SELECT groupid FROM groups WHERE groupid = '$check'");
        }
        return $check;
    }

    public function h_getGroupID($snq){
        $id = $this->m_Connection("SELECT groups FROM question WHERE id = '$snq'")->fetch();
        return $id['groups'];
    }

    public function h_getGroupName(){
        $id = $_SESSION['GroupID'];
        $id = $this->m_Connection("SELECT name FROM groups WHERE groupid = '$id'")->fetch();
        return $id['name'];
    }

    public function h_checkIfGroupValid($groupid){
        $count = $this->m_Connection("SELECT count('groupid') FROM groups WHERE groupid = '$groupid'")->fetch();
        if ($count["count('groupid')"] == 0) {
            return "<script>setTimeout(function() {document.getElementById('question').innerHTML = 
                '<i class=\"fas fa-exclamation-triangle text-red\"></i> Enter Valid Group ID';
                 clearInterval(check);}, 2000);</script>";
        }
    }

    public function h_getGroupsName(){
        $id = $this->h_myID();
        $query = $this->m_Connection("SELECT name, groupid FROM `groups` WHERE snp = '$id'");
        $reterned = '';
        while ($name = $query->fetch()) {
            $groupid = $name['groupid'];
            $reterned .= "<option value='$groupid'>" .  $name['name'] . "</option>";
        }
        return $reterned;
    }

    public function h_imagePath(){
        $var = $_SESSION['startUser'];
        $var = $this->m_Connection("SELECT image FROM `adminv` WHERE email = '$var'")->fetch();
        return $var['image'];
    }

    public function h_getGroupQuestions(){
        $groupid = $_SESSION['GroupID'];
        $query = $this->m_Connection("SELECT id, SUBSTR(question, 1, 18) AS question, form FROM `question` WHERE groups = '$groupid'");
        $returned = '';
        while ($q = $query->fetch()) {
            if ($q['form'] == 1) {
                $i = 'fas fa-chart-bar';
                $title = 'Bar chart';
            }elseif ($q['form'] == 2) {
                $i = 'far fa-grin-alt';
                $title = 'Emoji face';
            }elseif ($q['form'] == 3) {
                $i = 'fas fa-check';
                $title = 'Like or dislike';
            }elseif ($q['form'] == 0) {
                $i = 'fas fa-low-vision';
                $title = 'No style to now';
            }
            $form = $q['form'];
            $question = $q['question'];
            $id = $q['id'];
            if (empty($question)) {
                $question = '<span class="text-danger">Empty Question!</span>';
            }
                $returned .= "
                <li class='nav-item' data-title='$title' onclick='changeQuestionId(\"$id\", $form, \"$groupid\")'>
                    <a href='#' class='nav-link'>
                        <i class='$i nav-icon'></i>
                        <p>$question</p>
                    </a>
                </li>";
        }
        return $returned;
    }

    public function h_changePassword($oldPass, $newPass){
        $getPass = $_SESSION['startUser'];
        $getPass = $this->m_Connection("SELECT pass FROM adminv WHERE email = '$getPass';")->fetch();
        if (password_verify("Voot@2O2o" . md5($oldPass), $getPass['pass'])) {
            $user = $_SESSION['startUser'];
            $newPass = password_hash("Voot@2O2o" . md5($newPass), PASSWORD_DEFAULT);
            $this->m_Connection("UPDATE `adminv` SET `pass` = '$newPass' WHERE `adminv`.`email` = '$user';");
            return 'right';
        } else {
            return 'wrong';
        }
    }

    public function h_resetPassword($email, $insertCode = 'no'){
        if ($insertCode == 'no') {
            $codeToData = rand();
            $count = $this->m_Connection("SELECT COUNT(email) FROM `adminv` WHERE email = '$email';")->fetch();
            if ($count['COUNT(email)'] != 0) {
                $this->m_Connection("UPDATE `adminv` SET `resetpass` = '$codeToData' WHERE `adminv`.`email` = '$email';");
                return 'done';
                @$this->hf_sendEmail($email, "Enter $codeToData code to change password");
            }else {
                return 'Not Found';
            }
        }else {
            $count = $this->m_Connection("SELECT COUNT(email) FROM `adminv` WHERE email = '$email' and resetpass = '$insertCode';")->fetch();
            if ($count['COUNT(email)'] != 0) {
                return 'done';
            } else {
                return 'Enter code again';
            }
        }
    }

    public function h_changePasswordOnReset($email, $newPass, $confPass){
        if ($newPass === $confPass) {
            $newPass = password_hash("Voot@2O2o" . md5($newPass), PASSWORD_DEFAULT);
            $this->m_Connection("UPDATE `adminv` SET `pass` = '$newPass' WHERE `adminv`.`email` = '$email';");
            return 'done';
        }
    }

    public function h_changeUserName($newName){
        $id = $this->h_myID();
        $this->m_Connection("UPDATE `adminv` SET `fname` = '$newName' WHERE `adminv`.`id` = $id;");
        return 'done';
    }

    public function h_changeImage($file_name){
        $id = $this->h_myID();
        $this->m_Connection("UPDATE `adminv` SET `image` = 'userUploadImage/$file_name' WHERE `adminv`.`id` = $id;");
    }
}
