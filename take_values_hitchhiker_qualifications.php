<?php
  include ("Includes/Classes/Ride.class.php");
  include ("Includes/config.php");

  $nota       = $_GET['nota'];
  $hitchhiker = $_GET['hitchhiker'];
  $idViagem   = $_GET['idViagem'];

  $ride = new Ride(
            array('qualificacaoDoCaroneiro' => $nota)
    );

  $rideID = $ride->find(
                        array(
                          'idViagem' => $idViagem,
                          'idPessoaCaroneiro' => $hitchhiker
                          )
                      );



  $ride->valuePK = $rideID[0]['idCarona'];
  $ride->save();

  Util::redirect('travelDetails.php?travel=' . $idViagem);


?>