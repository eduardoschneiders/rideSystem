
<?php
header("Content-type: text/html; charset=utf-8");

?>

<form method="post" action="takeValues.php">
	city <input type="text" name="city" id="city" ><br/>
	name: <input type="text" name="name" id="name"><br/>
	email: <input type="text" name="email" id="email"><br/>
	password: <input type="password" name="password" id="password"><br/>
	retype password: <input type="password" name="retypePassword" id="retypePassword"><br/>
	gender: 
	Masculino <input type="radio" name="gender" value="m" id="genderMasculino">
	Femenino <input type="radio" name="gender" value="f" id="genderFemenino"><br/>
	Residential Phone<input type="text" name="residentialPhone"  id="residentialPhone"><br/>
	personal phone <input type="text" name="personalPhone" id="personalPhone" ><br/>
	birthDate <input type="text" name="birthDate" id="birthDate" ><br/>
	smoker: 
	sim<input type="radio" name="smoker" id="smokerSim" value="1"> 
	não<input type="radio" name="smoker" id="smokerNão" value="0"> <br/>
	qualificações positivas<input type="text" name="positiveQualification" id="positiveQualification" > <br/>
	qualificações negativas<input type="text" name="negativeQualification" id="negativeQualification" > <br/>
	photo<input type="text" name="photo" id="photo"> <br/>

	<input type="submit" value="Add">
	
</form>