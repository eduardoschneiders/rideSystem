<?php

Class Connection {

    private  $host = 'localhost';
    private $user = '';
    private $senha = '';
    private $db = '';
  
    public function connect() {
        $con = mysql_connect($this->host, $this->user, $this->senha) or die(mysql_error());
        $db = mysql_select_db($this->db, $con) or die(mysql_error());
        return $con;

    }
  
}

?>