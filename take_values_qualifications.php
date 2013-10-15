<?php
	include ("Includes/Classes/Ride.class.php");


	include ("Includes/config.php");
	$nota = $_GET['nota'];
	$motorista = $_GET['motorista'];
	$passageiro = $_SESSION['userId'];
	$idViagem = $_GET['idViagem'];


	echo $motorista;
	echo $nota;
	echo $passageiro;

	$ride = new Ride(
		array('qualificacaoDoMotorista' => $nota)

		);


	$ride->valuePK = $idViagem;

?>