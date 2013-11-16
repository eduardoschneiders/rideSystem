<?php
    require_once "Connection.class.php";
    class Base extends Connection{

        //propriedades
        public $table           = "";
        public $fields_values   = array();
        public $fieldPK         = NULL;
        public $valuePK         = NULL;
        public $extras_select   = "";

        //methods
        public function addField($field = NULL, $value = NULL){
            if($field)
                $this->fields_values[$field] = $value;
        }

        public function delField($field = NULL){
            if(array_key_exists($field, $this->fields_values))
                unset($this->fields_values[$field]);
        }

        public function setValue($field = NULL, $value = NULL){
            if($field && $value)
                $this->fields_values[$field] = $value;
        }

        public function getValue($field = NULL){
            if($field && array_key_exists($field, $this->fields_values))
                return $this->fields_values[$field];
            else
                return FALSE;
        }

        public function save(){

            $object = get_object_vars($this);

            if($object['valuePK'])
                $this->update();
            else
                $this->insert();
        }

        public function insert(){

            $object = get_object_vars($this);

            $i = 0;
            foreach ($object['fields_values'] as $key => $value) {        //Set VALUES and KEYS
                $keys .= $key;

                if(is_numeric($value))
                    $values .= $value;                          //if it's number, just include
                else
                    $values .= "'" . $value . "'";              //set " ' " in string

                if($i < (count($object['fields_values']) - 1)){   //set " , " between fields
                    $keys .= ", ";
                    $values .= ", ";
                }

                $i++;
            }

            $sql = "INSERT INTO " . $object['table'] . "(" . $keys . ") VALUES (" . $values . ")";        //Query
            // die($sql);
            return parent::runQuery($sql);
        }


        public function delete(){

            $object = get_object_vars($this);

            if(is_numeric($object['valuePK']))
                $restriction = " = " . $object['valuePK'];                                                //case NUMERIC, add '=' and the 'number'

            else if (is_string($object->valuePK))
                $restriction = " = '" . $object['valuePK'] . "'";                                         //case STRING, add 'value'

            else if(is_array($object->valuePK))
                $restriction = ' IN (' . implode(',', $object['valuePK']) . ')';                          //case ARRAY set the right structure, IN (array)

            $sql = "DELETE FROM " . $object['table'] . " WHERE " . $object['fieldPK'] . $restriction;       //Query
            return parent::runQuery($sql);

        }

        public function update(){

            $object = get_object_vars($this);


            $i = 0;
            foreach ($object['fields_values'] as $key => $value) {        //Set VALUES and KEYS
                $key = $key . " = ";

                if(!is_numeric($value))
                    $value = "'" . $value . "'";                //set " ' " in string

                if($i < (count($object['fields_values']) - 1)){   //set " , " between fields
                    $value .= ", ";
                }

                $key_values .= $key.$value;
                $i++;
            }

            if(!is_numeric($object['valuePK']))
                $object['valuePK'] = "'" . $object['valuePK'] . "'";                //set " ' " in string

            $sql = "UPDATE " . $object['table'] . " SET " . $key_values . " WHERE " . $object['fieldPK'] . " = " . $object['valuePK'];        //Query
            return parent::runQuery($sql);
        }

        public function find($id = array()){
            $object = get_object_vars($this);


            if($id){
                if(is_array($id)){

                    $restriction_value = array();
                    foreach ($id as $key => $value) {
                        $restriction_value[] = $key . ' = ' . $value;
                    }

                    $restriction_value = join($restriction_value, " AND ");
                    $restriction = " WHERE " . $restriction_value;
                }else
                    $restriction = " WHERE " . $object['fieldPK'] . " = " . $id;
            }

            $sql = "SELECT * FROM " . $object['table'] . $restriction;
            $query = parent::runQuery($sql);

            $lines = array();
            while ($line = mysql_fetch_assoc($query)) {
                $lines[] = $line;
            }

            return $lines;
        }

        public function getLastId(){
            $object = get_object_vars($this);
            $sql = "SELECT MAX(" . $object['fieldPK'] .") AS lastPK FROM " . $object['table'];
            $query = parent::runQuery($sql);
            $row =  mysql_fetch_assoc($query);
            return $row['lastPK'];
        }

        public function selectFields(){

            $object = get_object_vars($this);

            $i = 0;
            foreach ($object['fields_values'] as $key => $value) {        //Set VALUES and KEYS
                $keys .= $key;
                if($i < (count($object['fields_values']) - 1)){   //set " , " between fields
                    $keys .= ", ";
                }
                $i++;
            }


            $sql = "SELECT " . $keys . " FROM " . $object['table'];

            if($object['extras_select'])
                $sql .= " ".$object['extras_select'];

            return parent::runQuery($sql);
        }

        public function selectAll($object){

            $object = get_object_vars($this);

            $sql = "SELECT * FROM " . $object['table'];
            if($object['extras_select'])
                $sql .= " ".$object['extras_select'];

            return parent::runQuery($sql);
        }

    }
?>