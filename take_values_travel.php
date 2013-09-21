<?php

    include ("Includes/config.php");
    include ("Includes/Classes/Travel.class.php");

    //values of Cars
    $idMunicipioDestino     = $_POST["idMunicipioDestino"];
    $idMunicipioOrigem      = $_POST["idMunicipioOrigem"];
    $idPessoaMotorista      = $_POST["idPessoaMotorista"];
    $dataDePartida          = $_POST["dataDePartida"];
    $horarioDePartida       = $_POST["horarioDePartida"];
    $assentosDisponiveis    = $_POST["assentosDisponiveis"];
    $preco                  = $_POST["preco"];
    $observacao             = $_POST["observacao"];

    $travel = new Travel(
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

    $travel->insert();
    Util::redirect('showTravels.php');