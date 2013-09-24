<?php

  include ("Includes/config.php");
  include ("Includes/Classes/Person.class.php");
  include ("Includes/Classes/Upload.class.php");


  $city = $_POST["city"];
  $name =  $_POST["name"];
  $email = $_POST["email"];
  $password = md5($_POST["password"]);
  $gender = $_POST["gender"];
  $residentialPhone = $_POST["residentialPhone"];
  $personalPhone = $_POST["personalPhone"];
  $birthDate = $_POST["birthDate"];
  $smoker = $_POST["smoker"];
  // $photo = $_FILES["photo"];

  #uplod Photo
  $uniqId = Util::uniqId();
  $upload = new Upload();
  $person = new Person();
  $nextPersonId = $person->getLastId() + 1;

  $fileName = $nextPersonId . '_' . $name . '_' . $uniqId;
  if ($upload->upload_file($_FILES["photo"]["tmp_name"], 'Photos/People/', $fileName)){

  }

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
                      'fotografia'                => $upload->get_file_name()
                  )
              );

  $person->insert();
  Util::redirect('showTravels.php');