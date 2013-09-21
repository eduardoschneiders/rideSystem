<?php
  require_once "Base.class.php";

  class Ride extends Base{
    public function __construct($fields = array()){
      parent::__construct();              //call connection
      echo "teste";

      $this->table    = 'Carona';      //some default values
      $this->fieldPK  = 'idCarona';

      if(sizeof($fields) <= 0){           //get values to fields_values
        $this->fields_values = array(   //set default values
          'idViagem'               => NULL,
          'idPessoaCaroneiro'      => NULL,
        );
      }else{
        $this->fields_values = $fields;
      }

    }
  }