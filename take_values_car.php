<?php
  session_start();
  include ("Includes/config.php");
  include ("Includes/Classes/Car.class.php");
  include ("Includes/Classes/Upload.class.php");

  //values of Cars
  $idCar = $_POST["idCar"];
  $idPerson = $_POST["idPerson"];
  $plate = $_POST["plate"];
  $description = $_POST["description"];
  $year = $_POST["year"];
  $color = $_POST["color"];
  $photo = $_FILES["photo"];

   $valuesCar = array(
              'idPessoa'      => $idPerson,
              'placa'         => $plate,
              'descricao'     => $description,
              'ano'           => $year,
              'cor'           => $color,
              // 'fotografia'    => $upload->get_file_name()
          );

  if($photo['size']){

    if($idCar){
      $car = new Car();
      $car = $car->find($idCar);
      unlink('Photos/Cars/' . $car[0]['fotografia']);
    }

    $upload = new Upload();
    $uniqId = Util::uniqId();
    $car = new Car();

    $nextCarId = $car->getLastId() + 1;
    $userName = $_SESSION['userName'];

    $fileName = $nextCarId . '_' .  $userName . '_' . $uniqId;
    $upload->allowed_file_dimensions  = array('width' => 300, 'height' => 250);
    if ($upload->upload_file($photo["tmp_name"], 'Photos/Cars/', $fileName)){
      $valuesCar['fotografia'] = $upload->get_file_name();
    }
  }


  $car = new Car(
            $valuesCar
  );


  $car->valuePK = $idCar;

  $car->save();
  Util::redirect('showCar.php');