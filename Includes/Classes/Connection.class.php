<?php

class Connection {

    //properties
    private $server         = 'localhost';
    private $user           = 'rideSystem';
    private $pass           = 'rideSystem';
    private $DB             = 'rideSystem';
    private $connection     = NULL;
    private $dataset        = NULL;
    private $affectedLines  = -1;


    public function __construct(){
        $this->connect();
    }

    public function __destruct(){
        if($this->connection)
            mysql_close($this->connection);
    }

    public function connect(){
        $this->connection = mysql_connect($this->server, $this->user, $this->pass, TRUE)
        or die ($this->handleErrors(__FILE__, __FUNCTION__, mysql_errno(), mysql_error(), TRUE));
        mysql_select_db($this->DB) or die ("erro");



    }

    public function runQuery($sql = NULL){
        if ($sql){
            $query = mysql_query($sql) or $this->handleErrors(__FILE__, __FUNCTION__);
            $this->affectedLines = mysql_affected_rows($this->connection);

            if(substr(trim(strtolower($sql)),0, 6) == 'select'){

                $this->dataset = $query;

                return $query;
            }else{
                return $this->affectedLines;
            }
        }else
            $this->handleErrors(__FILE__, __FUNCTION__, NULL, 'Comando SQL não infomado', FALSE);
    }

    public function returnData($type = NULL){
        switch (strtolower($type)) {
            case 'array':
                return mysql_fetch_array($this->dataset);
                break;
            case 'assoc':
                return mysql_fetch_assoc($this->dataset);
                break;
            case 'object':
                return mysql_fetch_object($this->dataset);
                break;

            default:
                return mysql_fetch_object($this->dataset);
                break;
        }
    }

    public function handleErrors($file = NULL, $routine = NULL, $numError= NULL, $msgError = NULL, $generateException = FALSE){
        if($file == NULL) $file = 'Não informado';
        if($routine == NULL) $routine = 'Não informado';
        if($numError == NULL) $numError = mysql_errno($this->connection);
        if($msgError == NULL) $msgError = mysql_error($this->connection);
        $result = '
            Ocorreu um erro com os seguintes detalhes: <br />
            <strong>Arquivo:</strong> '.$file.'<br />
            <strong>Rotina:</strong> '.$routine.'<br />
            <strong>Código:</strong> '.$numError.'<br />
            <strong>Mensagem:</strong> '.$msgError;

        if($generateException == FALSE)
            echo $result;
        else{
            die($result);
        }


    }

}

class runQuery extends Connection{
    public function __construct($sql = NULL){
        $this->connect();
        $this->runQuery($sql);
    }
}
