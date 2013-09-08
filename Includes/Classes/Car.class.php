<?php
    require_once "Base.class.php";
    class Car extends Base{

        public function __construct($fields = array()){
            parent::__construct();              //call connection

            $this->table    = 'Carro';      //some default values
            $this->fieldPK  = 'idCarro';

            if(sizeof($fields) <= 0){           //get values to fields_values
                $this->fields_values = array(   //set default values
                    'idPessoa'   => NULL,
                    'placa'      => NULL,
                    'descricao'  => NULL,
                    'ano'        => NULL,
                    'cor'        => NULL,
                    'fotografia' => NULL,
                );
            }else{
                $this->fields_values = $fields;
            }
        }
    }
?>