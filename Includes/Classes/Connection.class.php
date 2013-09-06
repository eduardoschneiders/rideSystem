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

        mysql_query("SET NAMES 'iso-8859-1'");
        mysql_query("SET character_set_connection=iso-8859-1");
        mysql_query("SET character_set_client=iso-8859-1");
        mysql_query("SET character_set_results=iso-8859-1");
    }

    public function insert($objeto){
        $i = 0;
        foreach ($objeto->fields_values as $key => $value) {        //Set VALUES and KEYS
            $keys .= $key;

            if(is_numeric($value))
                $values .= $value;                          //if it's number, just include
            else
                $values .= "'" . $value . "'";              //set " ' " in string

            if($i < (count($objeto->fields_values) - 1)){   //set " , " between fields
                $keys .= ", ";
                $values .= ", ";
            }

            $i++;
        }

        $sql = "INSERT INTO " . $objeto->table . "(" . $keys . ") VALUES (" . $values . ")";        //Query
        return $this->runQuery($sql);
    }

    public function update($object){
        $i = 0;
        foreach ($object->fields_values as $key => $value) {        //Set VALUES and KEYS
            $key = $key . " = ";

            if(!is_numeric($value))
                $value = "'" . $value . "'";                //set " ' " in string

            if($i < (count($object->fields_values) - 1)){   //set " , " between fields
                $value .= ", ";
            }

            $key_values .= $key.$value;
            $i++;
        }

        if(!is_numeric($object->valuePK))
            $object->valuePK = "'" . $object->valuePK . "'";                //set " ' " in string

        $sql = "UPDATE " . $object->table . " SET " . $key_values . " WHERE " . $object->fieldPK . " = " . $object->valuePK;        //Query
        return $this->runQuery($sql);
    }

    public function delete($object){

        if(is_numeric($object->valuePK))
            $restriction = " = " . $object->valuePK;                                                //case NUMERIC, add '=' and the 'number'

        else if (is_string($object->valuePK))
            $restriction = " = '" . $object->valuePK . "'";                                         //case STRING, add 'value'

        else if(is_array($object->valuePK))
            $restriction = ' IN (' . implode(',', $object->valuePK) . ')';                          //case ARRAY set the right structure, IN (array)

        $sql = "DELETE FROM " . $object->table . " WHERE " . $object->fieldPK . $restriction;       //Query
        return $this->runQuery($sql);

    }

    public function selectAll($object){
        $sql = "SELECT * FROM " . $object->table;
        if($object->extras_select)
            $sql .= " ".$object->extras_select;

        return $this->runQuery($sql);
    }

    public function selectFields($object){

        $i = 0;
        foreach ($object->fields_values as $key => $value) {        //Set VALUES and KEYS
            $keys .= $key;
            if($i < (count($object->fields_values) - 1)){   //set " , " between fields
                $keys .= ", ";
            }
            $i++;
        }


        $sql = "SELECT " . $keys . " FROM " . $object->table;

        if($object->extras_select)
            $sql .= " ".$object->extras_select;

        return $this->runQuery($sql);
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
