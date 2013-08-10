
<?php
header("Content-type: text/html; charset=utf-8");
	include("Classes/Person.class.php");

	$person = new Person();

?>

<form method="post">
	name: <input type="text" name="name" id="name"><br/>
	emai: <input type="text" name="email" id="email"><br/>
	password: <input type="password" name="password" id="password"><br/>
	retype password: <input type="password" name="retypePassword" id="retypePassword"><br/>
	gender: 
	Masculino <input type="radio" name="gender" value="masculino" id="genderMasculino">
	Femenino <input type="radio" name="gender" value="femenino" id="genderFemenino"><br/>
	Residential Phone<input type="text" name="residentialPhone"  id="residentialPhone"><br/>
	personal phone <input type="text" name="personalPhone" id="personalPhone" ><br/>
	birthDate <input type="text" name="birthDate" id="birthDate" ><br/>
	age <input type="text" name="age" id="age"><br/>
	smoker: 
	sim<input type="radio" name="smoker" id="smokerSim" value="1"> 
	não<input type="radio" name="smoker" id="smokerNão" value="0"> <br/>
	city <input type="text" name="city" id="city" ><br/>


	<input type="submit" value="Add">
</form>
