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

    }
?>