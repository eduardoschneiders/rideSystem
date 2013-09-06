<?php

    include ("Includes/config.php");
    include ("Includes/Classes/Car.class.php");


    //values of Cars
    $idPerson = $_POST["idPerson"];
    $plate = $_POST["plate"];
    $description = $_POST["description"];
    $year = $_POST["year"];
    $color = $_POST["color"];
    $photo = $_POST["photo"];

    $car = new Car(
                    array(
                        'idPessoa'      => $idPerson,
                        'placa'         => $plate,
                        'descricao'     => $description,
                        'ano'           => $year,
                        'cor'           => $color,
                        'fotografia'    => $photo
                    )
                );

    $car->insert();