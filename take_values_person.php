<?php

    include ("Includes/config.php");
    include ("Includes/Classes/Person.class.php");

    $city = $_POST["city"];
    $name =  $_POST["name"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $gender = $_POST["gender"];
    $residentialPhone = $_POST["residentialPhone"];
    $personalPhone = $_POST["personalPhone"];
    $birthDate = $_POST["birthDate"];
    $smoker = $_POST["smoker"];
    $positiveQualification = $_POST["positiveQualification"];
    $negativeQualification = $_POST["negativeQualification"];
    $photo = $_POST["photo"];

    $person = new Person(
                    array(
                        'idMunicipio'               => $city,
                        'nome'                      => $name,
                        'email'                     => $email,
                        'senha'                     => $password,
                        'sexo'                      => $gender,
                        'telefoneResidencial'       => $residentialPhone,
                        'telefoneCelular'           => $personalPhone,
                        'dataDeNascimento'          => $birthDate,
                        'fumante'                   => $smoker,
                        'qualificacoesPositivas'    => $positiveQualification,
                        'qualificacoesNegativas'    => $negativeQualification,
                        'fotografia'                => $photo
                    )
                );

    $person->insert();
    Util::redirect('showRides.php');