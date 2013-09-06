
<?php
header("Content-type: text/html; charset=utf-8");

?>

<form method="post" action="take_values_car.php">
	Pessoa: <input type="text" name="idPerson" </input></br>
	Placa:	  <input type="text" name="plate"></input></br>
	Descrição: <input type="text" name="description"></input></br>
	Ano:	  <input type="text" name="year"></input></br>
	Cor:	  <input type="text" name="color"></input></br>
	Foto:	  <input type="text" name="photo"></input></br>

	<input type="submit" name="save" value="save"></input>
</form>