<?php

class Person {

    private $city;
	private $name;
	private $email;
    private $password;
    private $gender;
    private $residentialPhone;
	private $personalPhone;
	private $birthDate;
	private $smoker;
	private $positiveQualification;
	private $negativeQualification;
	private $photo;

     public function setCity($auxCity){
        $this->city = $auxCity;
    }

	public function setName($auxName) {
        $this->name = $auxName;
    }
    public function setEmail($auxEmail){
        $this ->email = $auxEmail;
    }

    public function setPassword($auxPassword){
        $this->password = md5($auxPassword);
    }

    public function setGender($auxGender){
        $this->gender = $auxGender;
    }

    public function setResidentialPhone($auxResidentialPhone){
        $this->residentialPhone = $auxResidentialPhone;
    }

    public function setPersonalPhone($auxPersonalPhone){
        $this->personalPhone = $auxPersonalPhone;
    }

    public function setBirthDate($auxBirthDate){
        $this->birthDate = $auxBirthDate;
    }

    public function setSmoker($auxSmoker){
        $this->smoker = $auxSmoker;
    }
   
    public function setPositiveQualification($auxPositiveQualification){
        $this->positiveQualification = $auxPositiveQualification;
    }

    public function setNegativeQualification($auxNegativeQualification){
        $this->negativeQualification = $auxNegativeQualification;
    }
    public function setPhoto($auxPhoto){
        $this->photo = $auxPhoto;
    }


    public function inserir($connection) {

        $query = ("insert into Pessoa (idMunicipio,nome,email,senha,sexo,telefoneResidencial,telefoneCelular,dataDeNascimento,fumante,qualificacoesPositivas,qualificacoesNegativas,fotografia) values('" . $this->city . "','" . $this->name . "','" . $this->email . "','" . $this->password . "','" . $this->gender . "','" . $this->residentialPhone . "','" . $this->personalPhone . "','" . $this->birthDate . "','" . $this->smoker . "','" . $this->positiveQualification . "','" . $this->negativeQualification . "','" . $this->photo . "')");
        $sql = mysql_query($query, $connection);
        return ($sql);
    }

    public function listarPessoa($connection) {

        $query = ("SELECT nome,email,sexo,telefoneResidencial,telefoneCelular,dataDeNascimento,fumante,qualificacoesPositivas,qualificacoesNegativas,fotografia FROM Pessoa");
        $sql = mysql_query($query, $connection);
        $numeroLinhas = mysql_affected_rows($connection);
         
        $linhas = array();
        for ($i = 0; $i < $numeroLinhas; $i++) {
            $linha = mysql_fetch_array($sql);
 
            $linhas[] = $linha;
        }
        return $linhas;
        //return ($sql);
    }



}
?>


