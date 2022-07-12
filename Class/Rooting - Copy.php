<?php

 class Root  {
     /* Properties */
     private $conn;

     private static function connection()
     {
         static $host = '127.0.0.1';
         static $db = 'voote';
         static $user = 'root';
         static $pass = '';
         static $charset = 'utf8';
         $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
         $opt = [
             \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
             \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
             \PDO::ATTR_EMULATE_PREPARES => false,
         ];
         $pdok = new \PDO($dsn, $user, $pass, $opt);
         return $pdok;
     }

     /* Get database access */
     public function __construct()
     {
         $this->conn = Root::connection();
     }

     public function get_users($id, $type)
     {
         $o = $this->conn->query("SELECT * FROM ques WHERE id = '$id'")->fetch();
         if ($type == "r") {
             return $o['snq'];
         } elseif ($type == "e") {
             echo $o['snq'];
         }
     }

     public function m_Connection($sql) {
         $data = $this->conn->query($sql);
         return $data;
     }

     static public function hf_editEntry($entry){
         $option = func_get_args();
         if (in_array('tag', $option)){
             $entry = strip_tags($entry);
         }
         if (in_array('Ucf', $option)){
             $entry = ucfirst($entry);
         }
         if (in_array('dltSym', $option)){
             $entry = str_replace('!', '', $entry);
             $entry = str_replace('"', '', $entry);
             $entry = str_replace('£', '', $entry);
             $entry = str_replace('$', '', $entry);
             $entry = str_replace('%', '', $entry);
             $entry = str_replace('^', '', $entry);
             $entry = str_replace('&', '', $entry);
             $entry = str_replace('*', '', $entry);
             $entry = str_replace('+', '', $entry);
             $entry = str_replace('-', '', $entry);
             $entry = str_replace('@', '', $entry);
             $entry = str_replace("'", '', $entry);
             $entry = str_replace('/', '', $entry);
             $entry = str_replace('_', '', $entry);
             $entry = str_replace('=', '', $entry);
             $entry = str_replace('[', '', $entry);
             $entry = str_replace(']', '', $entry);
             $entry = str_replace('{', '', $entry);
             $entry = str_replace('}', '', $entry);
             $entry = str_replace('?', '', $entry);
             $entry = str_replace('.', '', $entry);
         }
         return $entry;
     }

     public function hf_allEdit($entry){
         return $this->hf_editEntry($entry, 'tag', 'Ucf', 'rplcSpc');
     }

     public function hf_sendEmail($email, $msg){
         mail($email,"Voote team",$msg);
     }
 }

#$root = new Root();
#echo $root->get_users(22, 'e');
