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
  $personIdParam    = $_POST['person'];






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


  #uplod Photo
  if($photo['size']){

    $uniqId = Util::uniqId();
    $upload = new Upload();

    $personId = $personIdParam;
    if (!$personIdParam){
      $person = new Person();
      $personId = $person->getLastId() + 1;
    }


    $fileName = $personId . '_' . Util::clearString(Util::firstWord($name)) . '_' . $uniqId;

    $upload->allowed_file_dimensions = array('width' => 500, 'height' => 250);
    $upload->upload_file($photo["tmp_name"], 'Photos/People/', $fileName);

    $personData['fotografia'] = $upload->get_file_name();
    $_SESSION["userPhoto"] = $upload->get_file_name();

  }

  $person = new Person($personData);
  if ($personIdParam)
    $person->valuePK = $personIdParam;
  $person->save();

  Util::redirect('showTravels.php');