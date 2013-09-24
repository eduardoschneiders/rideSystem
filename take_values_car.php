<?php
  session_start();
  include ("Includes/config.php");
  include ("Includes/Classes/Car.class.php");
  include ("Includes/Classes/Upload.class.php");



  //values of Cars
  $idPerson = $_POST["idPerson"];
  $plate = $_POST["plate"];
  $description = $_POST["description"];
  $year = $_POST["year"];
  $color = $_POST["color"];
  $photo = $_POST["photo"];

  $upload = new Upload();
  $uniqId = Util::uniqId();
  $car = new Car();
  $nextCarId = $car->getLastId() + 1;
  $userName = $_SESSION['userName'];

  $fileName = $nextCarId . '_' .  $userName . '_' . $uniqId;
  $upload->allowed_file_dimensions  = array('width' => 300, 'height' => 250);
  if ($upload->upload_file($_FILES["photo"]["tmp_name"], 'Photos/Cars/', $fileName)){

  }

    $car = new Car(
                    array(
                        'idPessoa'      => $idPerson,
                        'placa'         => $plate,
                        'descricao'     => $description,
                        'ano'           => $year,
                        'cor'           => $color,
                        'fotografia'    => $upload->get_file_name()
                    )
                );

    $car->insert();
    Util::redirect('showTravels.php');