<?php
    session_start();

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
            $select = "select idPessoa, nome, fotografia, senha from Pessoa where nome = '" . $this->login . "' and senha = '" . md5($this->password) . "' " ;
            $query = mysql_query($select);
            $linhas = mysql_num_rows($query);
            $result = mysql_fetch_array($query);
            if ($linhas >= 1):
                $_SESSION["logged"] = TRUE;
                $_SESSION["userId"] = $result["idPessoa"];
                $_SESSION["userName"] = $result["nome"];
                $_SESSION["userPhoto"] = $result["fotografia"];
                echo '<script type="text/javascript">document.location.href="index.php";</script>';
            else:
                $_SESSION["logged"] = FALSE;
            endif;
        }

        public function permission(){
            if (!$_SESSION["logged"]){
                echo("<script language = 'javascript'> alert('Você não tem permissão para acessar essa area do site!'); </script>");
                echo("<script language = 'javascript'> location.href = 'login.php'; </script>");

            }
        }

   }
?>