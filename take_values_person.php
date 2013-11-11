<?php

  include ("Includes/config.php");
  include ("Includes/Classes/Person.class.php");
  include ("Includes/Classes/Upload.class.php");


  $city             = $_POST["city"];
  $name             =  $_POST["name"];
  $email            = $_POST["email"];
  $password         = md5($_POST["password"]);
  $gender           = $_POST["gender"];
  $residentialPhone = $_POST["residentialPhone"];
  $personalPhone    = $_POST["personalPhone"];
  $birthDate        = $_POST["birthDate"];
  $smoker           = $_POST["smoker"];
  $photo            = $_FILES["photo"];
  $personId         = $_POST['person'];




  #uplod Photo
  $uniqId = Util::uniqId();
  $upload = new Upload();
  $person = new Person();

  if (!$personId)
    $personId = $person->getLastId() + 1;

  $fileName = $personId . '_' . Util::clearString(Util::firstWord($name)) . '_' . $uniqId;



  $upload->allowed_file_dimensions = array('width' => 500, 'height' => 250);
  if ($upload->upload_file($photo["tmp_name"], 'Photos/People/', $fileName)){

  }

  $personData = array(
                      'idMunicipio'               => $city,
                      'nome'                      => $name,
                      'email'                     => $email,
                      'senha'                     => $password,
                      'sexo'                      => $gender,
                      'telefoneResidencial'       => $residentialPhone,
                      'telefoneCelular'           => $personalPhone,
                      'dataDeNascimento'          => $birthDate,
                      'fumante'                   => $smoker,
                  );

  if($photo)
    $personData['fotografia'] = $upload->get_file_name();

  $person = new Person($personData);


  $person->valuePK = $personId;
  $person->save();

  $_SESSION["userPhoto"] = $upload->get_file_name();
  Util::redirect('showTravels.php');