<?php
  session_start();
  include ("Includes/config.php");
  include("Includes/Classes/Ride.class.php");

  $travel = $_GET['travel'];
  $passenger = $_SESSION['userId'];
  $ride = new Ride(
                    array(
                        'idViagem'          => $travel,
                        'idPessoaCaroneiro' => $passenger,
                    )
                );
echo "adsf";

    $ride->insert();
    Util::redirect('showTravels.php');

?>