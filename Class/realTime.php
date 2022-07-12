<?php
require 'handel.php';
session_start();

class realTime extends handel {
    public function r_CheckIfQActive($group){
        $active = $this->m_Connection("SELECT id FROM `question` WHERE groups = '$group' AND active = 1")->fetch();
        if (isset($active['id']) and isset($_SESSION['userMAC']) and $this->h_CheckIfAnswer($_SESSION['userMAC'], $active['id'])) {
            return $active['id'];
        }else{
            return 'no';
        }
    }

    public function r_ChangeActive($snq, $work){
        if (isset($_SESSION['startUser'])) {
            $userID = $this->h_myID();
            if ($work == 'open') {
                $this->m_Connection("UPDATE `question` SET `active` = '0' WHERE `question`.`snp` = '$userID';");
                $this->m_Connection("UPDATE `question` SET `active` = '1' WHERE `question`.`id` = '$snq';");
                return 'done';
            }elseif ($work == 'close') {
                $this->m_Connection("UPDATE `question` SET `active` = '0' WHERE `question`.`snp` = '$userID';");
            }

        }

    }

    public function r_ChartData($snq){
        $chart = $this->m_Connection("SELECT formstyle.htmlcode
        FROM question
        LEFT JOIN formstyle
        ON question.id = '$snq'
        WHERE question.form = formstyle.id;")->fetch();
        return '<div class="row" id="realTimeChart">' .  $chart['htmlcode'] . '</div>';
    }

    public function r_EditQuestion($snq, $type, $text){
        $text = $this->hf_editEntry($text, 'tag');
        if ($type == 'q'){
            $this->m_Connection("UPDATE `question` SET `question` = '$text' WHERE `question`.`id` ='$snq';");
        }elseif ($type == 'a1' || $type == 'a2' || $type == 'a3'|| $type == 'a4'){
            $this->m_Connection("UPDATE `question` SET `$type` = '$text' WHERE `question`.`id` = '$snq';");
        }
        return 'done';

    }

    public function r_NewQuestion(){
        $snp = $this->h_myID();
        $id = $this->h_idGenerate();
        $group = $_SESSION['GroupID'];
        $this->m_Connection("INSERT INTO `question` VALUES ('$id', '', '', '', '', '', '0', '0', '0', '$snp', '$group');");
        return $id;
    }

    public function r_EditForm($snq, $form){
        $count = $this->m_Connection("SELECT count(id) FROM question WHERE id = '$snq';")->fetch();
        if ($count['count(id)'] == '1'){
            $this->m_Connection("UPDATE `question` SET `form` = '$form' WHERE `question`.`id` = '$snq';");
            return 'done';
        }
    }

    public function r_chackNewAnswersChart($snq){
        $all = $this->m_Connection("SELECT COUNT(answer) FROM answer WHERE snq = '$snq'")->fetch();
        $all = $all['COUNT(answer)'];
        if ($all != 0) {
            $a1 = $this->m_Connection("SELECT COUNT(answer) FROM answer WHERE answer = 'a1' AND snq = '$snq'")->fetch();
            $a2 = $this->m_Connection("SELECT COUNT(answer) FROM answer WHERE answer = 'a2' AND snq = '$snq'")->fetch();
            $a3 = $this->m_Connection("SELECT COUNT(answer) FROM answer WHERE answer = 'a3' AND snq = '$snq'")->fetch();
            $a4 = $this->m_Connection("SELECT COUNT(answer) FROM answer WHERE answer = 'a4' AND snq = '$snq'")->fetch();


            $a1 = intval($a1['COUNT(answer)'])/$all*100;
            $a2 = intval($a2['COUNT(answer)'])/$all*100;
            $a3 = intval($a3['COUNT(answer)'])/$all*100;
            $a4 = intval($a4['COUNT(answer)'])/$all*100;


            return $all . '•' . $a1 . '•' . $a2 . '•' . $a3 . '•' . $a4;
        }else{
            return '0•0•0•0•0';
        }
    }
}
