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

        public function insert(){
            parent::insert($this);
        }

        public function update(){
            parent::update($this);
        }

        public function delete(){
            parent::delete($this);
        }

        public function selectFields(){
            return parent::selectFields($this);
        }

        public function selectAll(){
            return parent::selectAll($this);
        }


    }
?>