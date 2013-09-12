<?php
    require_once "Base.class.php";
    class Login extends Base{
  
        private $login;
        private $password;

        public function setLogin($auxLogin){
            $this->login = $auxLogin;
        }

        public function setPassword($auxPassword){
            $this->password = $auxPassword;
        }

        public function signIn(){
            $select = "select senha from Pessoa where nome = '" . $this->login . "'";
            $query = mysql_query($select);      
            $linhas = mysql_num_rows($query);
            $result = mysql_fetch_array($query);       
            if ((md5($this->password) == $result["senha"]) and ($linhas == 1)):
                echo "Logado com sucesso";
            else:
                echo "Não logado!";
            endif;

        }
    
   }
?>