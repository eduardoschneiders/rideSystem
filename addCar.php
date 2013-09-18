
<?php
header("Content-type: text/html; charset=utf-8");

include ("Includes/Classes/Person.class.php");
include ("Includes/config.php");
include ("Includes/Classes/Login.class.php");

$login = new Login();
$person = new Person();
$html = new Html();

$login->permission();

echo $html->header();

$all_people = $person->find();

foreach ($all_people as $key => $person) {
    $person_options .= '<option  value="' . $person['idPessoa'] . '">' . $person['nome'] . '</option>';
}

?>

<form method="post" action="take_values_car.php">
    Pessoa:     <select name="idPerson"><?php echo $person_options ?></select></br>
    Placa:      <input type="text" name="plate"></input></br>
    Descrição:  <input type="text" name="description"></input></br>
    Ano:        <input type="text" name="year"></input></br>
    Cor:        <input type="text" name="color"></input></br>
    Foto:       <input type="text" name="photo"></input></br>

    <input type="submit" name="save" value="save"></input>
</form>


<?php echo $html->footer(); ?>