<?php

    include ("Includes/config.php");
    include ("Includes/Classes/Login.class.php");
 	

 	$nome = $_POST["nome"];
    $senha = $_POST["senha"];

    $login = new Login();

    $login->setLogin($nome);
    $login->setPassword($senha);

    $login->signIn();

    $login->permission();

   
 
?>