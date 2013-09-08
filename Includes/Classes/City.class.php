<?php
    require_once "Base.class.php";
    class City extends Base{

        public function __construct($fields = array()){
            parent::__construct();              //call connection

            $this->table    = 'Municipio';      //some default values
            $this->fieldPK  = 'idMunicipio';

            if(sizeof($fields) <= 0){           //get values to fields_values
                $this->fields_values = array(   //set default values
                    'nome' => NULL,
                    'uf' => NULL
                );
            }else{
                $this->fields_values = $fields;
            }
        }
    }
?>