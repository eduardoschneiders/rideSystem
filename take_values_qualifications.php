<?php
	include ("Includes/Classes/Ride.class.php");


	include ("Includes/config.php");
	$nota = $_GET['nota'];

	$passageiro = $_SESSION['userId'];
	$idViagem = $_GET['idViagem'];
	$currentUser = $_SESSION['userId'];


	$ride = new Ride(
		array('qualificacaoDoMotorista' => $nota)

		);

	 $rideID = $ride->find(
                        array(
                          'idViagem' => $idViagem,
                          'idPessoaCaroneiro' => $currentUser
                          )
                      );



	$ride->valuePK = $rideID[0]['idCarona'];
	$ride->save();

	Util::redirect('showTravels.php');

?>