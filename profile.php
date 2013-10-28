
<?php
header("Content-type: text/html; charset=utf-8");
include ("Includes/Classes/City.class.php");
include ("Includes/Classes/Person.class.php");
include ("Includes/config.php");

$city = new City();
$person = new Person();
$html = new Html();

$idPerson = $_GET['idPerson'];
if ($idPerson){
	$thePerson = $person->find($idPerson);
	Util::pr($thePerson);
}

echo $html->header();

foreach ($city->find() as $key => $city) {

	$selected = '';
	if ($city['idMunicipio'] == $thePerson[0]['idMunicipio'])
		$selected = 'selected="selected"';

	$city_options .= '<option ' . $selected . ' value="' . $city['idMunicipio'] . '">' . $city['nome'] . '</option>';
}

?>

<form method="post" action="take_values_person.php" enctype="multipart/form-data">

	Cidade:
		<select name="city">
		<?php echo $city_options ?>
		</select></br>
	name: <input type="text" name="name" id="name" value="<?php echo $thePerson['nome']?>"><br/>
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
	photo<input type="file" name="photo" id="photo"> <br/>

	<input type="submit" value="Add">

</form>

<?php echo $html->footer(); ?>