<?php

    include ("Includes/config.php");
    include ("Includes/Classes/Ride.class.php");

    //values of Cars
    $idMunicipioDestino     = $_POST["idMunicipioDestino"];
    $idMunicipioOrigem      = $_POST["idMunicipioOrigem"];
    $idPessoaMotorista      = $_POST["idPessoaMotorista"];
    $dataDePartida          = $_POST["dataDePartida"];
    $horarioDePartida       = $_POST["horarioDePartida"];
    $assentosDisponiveis    = $_POST["assentosDisponiveis"];
    $preco                  = $_POST["preco"];
    $observacao             = $_POST["observacao"];

    $ride = new Ride(
                    array(
                        'idMunicipioDestino'    => $idMunicipioDestino,
                        'idMunicipioOrigem'     => $idMunicipioOrigem,
                        'idPessoaMotorista'     => $idPessoaMotorista,
                        'dataDePartida'         => $dataDePartida,
                        'horarioDePartida'      => $horarioDePartida,
                        'assentosDisponiveis'   => $assentosDisponiveis,
                        'preco'                 => $preco,
                        'observacao'            => $observacao
                    )
                );

    $ride->insert();