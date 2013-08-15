<?php
	

	include ("Classes/connectionDatabase.Class.php");
	include ("Classes/Person.class.php");

	$con = new Connection();		
	$per = new Person();

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
	
  header("Location: showPerson.php"); 
  exit();
?>