<?php

    include ("Includes/config.php");
    include ("Includes/Classes/City.class.php");

    $city = new City(
                    array(
                        'nome' => $_POST['cityName'],
                        'uf' => $_POST['uf']
                    )
                );

    $city->insert();
    Util::redirect('showTravels.php');
?>