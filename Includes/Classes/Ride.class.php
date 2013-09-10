<?php
    require_once "Base.class.php";
    class Ride extends Base{

        public function __construct($fields = array()){
            parent::__construct();              //call connection

            $this->table    = 'Viagem';      //some default values
            $this->fieldPK  = 'idViagem';

            if(sizeof($fields) <= 0){           //get values to fields_values
                $this->fields_values = array(   //set default values
                    'idMunicipioDestino'    => NULL,
                    'idMunicipioOrigem'     => NULL,
                    'idPessoaMotorista'     => NULL,
                    'dataDePartida'         => NULL,
                    'horarioDePartida'      => NULL,
                    'assentosDisponiveis'   => NULL,
                    'preco'                 => NULL,
                    'observacao'            => NULL,
                );
            }else{
                $this->fields_values = $fields;
            }
        }
    }
?>