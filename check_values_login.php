<?php

    include ("Includes/config.php");
    include ("Includes/Classes/Login.class.php");
 	

 	$email = $_POST["email"];
    $senha = $_POST["senha"];

    echo $email;
    echo $senha;

    $login = new Login();

    $login->setLogin($email);
    $login->setPassword($senha);

    $login->signIn();

 	$login->permission();

   
 
?>