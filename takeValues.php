<?php
	
	include ("Classes/connectionDatabase.Class.php");
	include ("Classes/Person.class.php");
	include ("Classes/City.class.php");
	include ("Classes/Car.class.php");

	$con = new Connection();		
	$per = new Person();
	$ci = new City();
	$car = new Car();

	//values of people

	$city = $_POST["city"];
	$name =  $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$gender = $_POST["gender"];
	$residentialPhone = $_POST["residentialPhone"];
	$personalPhone = $_POST["personalPhone"];
	$birthDate = $_POST["birthDate"];
	$smoker = $_POST["smoker"];
	$positiveQualification = $_POST["positiveQualification"];
	$negativeQualification = $_POST["negativeQualification"];
	$photo = $_POST["photo"];

	$per->setCity($city);
	$per->setName($name);
	$per->setEmail($email);
	$per->setPassword($password);
	$per->setGender($gender);
	$per->setResidentialPhone($residentialPhone);
	$per->setPersonalPhone($personalPhone);
	$per->setBirthDate($birthDate);
	$per->setSmoker($smoker);
	$per->setPositiveQualification($positiveQualification);
	$per->setNegativeQualification($negativeQualification);
	$per->setPhoto($photo);

	$per->inserir($con->connect());

	//values of cities
	$cityName = $_POST["cityName"];
	$uf = $_POST["uf"];
	
	$ci->setNameCity($cityName);
	$ci->setUf($uf);
	$ci->insertCity($con->connect());

	//values of Cars
	$idPerson = $_POST["idPerson"];
	$plate = $_POST["plate"];
	$description = $_POST["description"];
	$year = $_POST["year"];
	$color = $_POST["color"];
	$photo = $_POST["photo"];

	echo $idPerson;
	echo $plate;
	echo $description;
	echo $year;
	echo $color;
	echo $photo;

	$car->setIdPerson($idPerson);
	$car->setPlate($plate);
	$car->setDescription($description);
	$car->setYear($year);
	$car->setColor($color);
	$car->setPhoto($photo);


	$car->insertCar($con->connect());

	 header("Location: showPerson.php");
  	 exit();
		
  
?>