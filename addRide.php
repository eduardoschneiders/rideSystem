
<?php
header("Content-type: text/html; charset=utf-8");

include ("Includes/Classes/Person.class.php");
include ("Includes/Classes/City.class.php");
include ("Includes/config.php");

$person = new Person();
$all_people = $person->find();
foreach ($all_people as $key => $person) {
    $person_options .= '<option  value="' . $person['idPessoa'] . '">' . $person['nome'] . '</option>';
}



$city = new City();
$all_cities = $city->find();
foreach ($all_cities as $key => $city) {
    $city_options .= '<option  value="' . $city['idMunicipio'] . '">' . $city['nome'] . '</option>';
}


$html = new Html();
echo $html->header();
?>

<form method="post" action="take_values_ride.php">

    Origem:                 <select name="idMunicipioDestino"><?php echo $city_options ?></select></br>
    Destino:                <select name="idMunicipioOrigem"><?php echo $city_options ?></select></br>
    Motorista:              <select name="idPessoaMotorista"><?php echo $person_options ?></select></br>
    Data De Partida:        <input type="text" name="dataDePartida"></input></br>
    Horario De Partida:     <input type="text" name="horarioDePartida"></input></br>
    Assentos Disponiveis:   <input type="text" name="assentosDisponiveis"></input></br>
    Preco:                  <input type="text" name="preco"></input></br>
    Observação:             <input type="text" name="observacao"></input></br>

    <input type="submit" name="save" value="save"></input>
</form>


<?php echo $html->footer(); ?>