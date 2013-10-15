<?php
	include ("Includes/config.php");
	$nota = $_GET['nota'];
	$_SESSION['teste'] = "alguma";

	$motorista = $_GET['motorista'];
	$passageiro = $_SESSION['userId'];

	echo $passageiro;
	var_dump($_SESSION)



?>