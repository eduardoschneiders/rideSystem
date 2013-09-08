<?php
    require_once "Base.class.php";
    class Person extends Base{

        public function __construct($fields = array()){
            parent::__construct();              //call connection

            $this->table    = 'Pessoa';      //some default values
            $this->fieldPK  = 'idPessoa';

            if(sizeof($fields) <= 0){           //get values to fields_values
                $this->fields_values = array(   //set default values
                    'idMunicipio'               => NULL,
                    'nome'                      => NULL,
                    'email'                     => NULL,
                    'senha'                     => NULL,
                    'sexo'                      => NULL,
                    'telefoneResidencial'       => NULL,
                    'telefoneCelular'           => NULL,
                    'dataDeNascimento'          => NULL,
                    'fumante'                   => NULL,
                    'qualificacoesPositivas'    => NULL,
                    'qualificacoesNegativas'    => NULL,
                    'fotografia'                => NULL
                );
            }else{
                $this->fields_values = $fields;
            }

        }

    }
?>