<?php

    include ("Includes/config.php");
    include ("Includes/Classes/City.class.php");

    // $con = new Connection();
    $city = new City(
                    array(
                        'nome' => $_POST['cityName'],
                        'uf' => $_POST['uf']
                    )
                );

    $city->insert();
?>