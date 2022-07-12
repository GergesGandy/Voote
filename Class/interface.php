<?php
interface RootIF{
    public function m_UploadDatabase($host, $MySqlUser, $MySqlPass, $databasePath);
    public function m_Connection($sql);
}

interface handelIF {
    public function h_LogIn($userName, $password);
    public function h_myID($sessionEmail);
    public function h_CreateAdmin($fName, $email, $pass, $passConferm);
    public function h_AddQuestion($snp, $Question, $a1,$a2,$a3,$a4, $active, $timer, $type, $slideForm);// return $snq
    public function h_CheckIfAnswer1($MAC, $IP);
    public function h_CheckIfAnswer2($userName);
    public function h_AddAnswer1($answer, $snq, $snp, $MAC, $IP);
    public function h_AddAnswer2($answer, $snq, $snp, $userName);
    public function h_CloseQuestion($snq);
    public function h_idGenerate();
    public function h_getWord($wordID, $type);

}

interface realTimeIF{
    public function r_CheckIfQActive($group); //if yes return $snq
    public function r_CheckIfSnqClose($snq);
    public function r_ChangeTimer($snq, $newTimer);
    public function r_ChangeActive($snq, $work);
    public function r_ChartData($snq);
    public function r_EditQuestion($snq, $type, $text);
    public function r_NewQuestion($group);
    public function r_EditForm($snq, $form);
}

interface helpFunctionsIF{
    public function hf_editEntry($entry/*, [tag, Ucf, dltSym]*/);
    public function hf_allEdit($entry);
}