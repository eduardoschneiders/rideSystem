<?php
Class Car {

	private $idPerson;
	private $plate;
	private $description;
	private $year;
	private $color;
	private $photo;


	public function setIdPerson($auxIdPerson){
		$this->idPerson = $auxIdPerson;
	}

	public function setPlate($auxPlate){
		$this->plate = $auxPlate;
	}

	public function setDescription($auxDescription){
		$this->description = $auxDescription;
	}

	public function setYear($auxYear){
		$this->year = $auxYear;
	}

	public function setColor($auxColor){
		$this->color = $auxColor;
	}

	public function setPhoto($auxPhoto){
		$this->photo = $auxPhoto;
	}

	public function insertCar($connection){
		$query = ("insert into Carro (idPessoa,placa,descricao,ano,cor,fotografia) values('" . $this->idPerson . "','" . $this->plate . "','" . $this->description . "','" . $this->year . "','" . $this->color . "','" . $this->photo . "')");
		$sql = mysql_query($query,$connection);
		return($sql);
	}	

 }

?>