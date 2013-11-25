
<?php
include ("Includes/Classes/Travel.class.php");
include ("Includes/Classes/Ride.class.php");
include ("Includes/Classes/City.class.php");
include ("Includes/Classes/Person.class.php");
include ("Includes/config.php");

$travel = new Travel();
$city = new City();
$person = new Person();
$ride = new Ride();

$html = new Html();
echo $html->header();

$driver = $_GET['driver'];

$restriction = array();

if($driver)
  $restriction['idPessoaMotorista'] = $driver;

$from             = $_POST["from"];
$destination      = $_POST["destination"];
$driver           = $_POST["driver"];
$start_date       = $_POST["start_date"];
$available_seats  = $_POST["available_seats"];

if ($_POST){
  if ($from)
    $restriction['idMunicipioOrigem'] = $from;
  if ($destination)
    $restriction['idMunicipioDestino'] = $destination;
  if ($driver)
    $restriction['idPessoaMotorista'] = $driver;
  if ($start_date)
    $restriction['dataDePartida'] = $start_date;
  if ($available_seats)
    $restriction['assentosDisponiveis'] = $available_seats;

}

$travels = $travel->find($restriction);

foreach ($travels as $key => $travel) {
	$from = $city->find($travel['idMunicipioDestino']);
	$to = $city->find($travel['idMunicipioOrigem']);
	$driver = $person->find($travel['idPessoaMotorista']);
  $availableSeats = $travel['assentosDisponiveis'] - count($ride->find(array('idViagem' => $travel['idViagem'])));

	$travels_item .= '
					<li>
              <b>De:</b> ' . $from[0]['nome'] . '
              <b>Até:</b> ' . $to[0]['nome'] . '
              <b>Motorista:</b> ' . $driver[0]['nome'] . '
              <b>Partida:</b> ' . Util::convertDate($travel['dataDePartida']) . ' ' . $travel['horarioDePartida'] . '
              <b>Lugares Disponíveis:</b> ' . $availableSeats  . '
            <a href="takeRide.php?travel=' . $travel['idViagem'] . '">
              Carona
            </a>
            <a href="travelDetails.php?travel=' . $travel['idViagem'] . '">
              Detalhes
            </a>
            <b><a href="take_values_qualifications.php?nota=1&idViagem='. $travel['idViagem'] .'" >1</b>
            <b><a href="take_values_qualifications.php?nota=2&idViagem='. $travel['idViagem'] .'" >2</b>
            <b><a href="take_values_qualifications.php?nota=3&idViagem='. $travel['idViagem'] .'" >3</b>
            <b><a href="take_values_qualifications.php?nota=4&idViagem='. $travel['idViagem'] .'" >4</b>
            <b><a href="take_values_qualifications.php?nota=5&idViagem='. $travel['idViagem'] .'" >5</b>
					</li>
				';
}
$city = new City();

foreach ($city->find() as $key => $city) {

  $selected = '';
  $city_options .= '<option ' . $selected . ' value="' . $city['idMunicipio'] . '">' . $city['nome'] . '</option>';
}

$person = new Person();
$pessoas = $person->find();

foreach ($pessoas as $pessoa) {
         $pessoa_options .= '<option ' . $selected . ' value="' . $pessoa['idPessoa'] . '">' . $pessoa['nome'] . '</option>';
}


?>

<form method="POST">

  <label>Origem:<select name="from" id="from" class="form-text required">
    <option value="">Selecionar</option>
      <?php echo $city_options ?>
  </select></label>

  <label>Destino:<select name="destination" id="destination" class="form-text required">
    <option value="">Selecionar</option>
      <?php echo $city_options ?>
  </select></label>

  <label>Motorista:<select name="driver" id="driver" class="form-text required">
    <option value="">Selecionar</option>
      <?php echo $pessoa_options ?>
  </select></label>

  <label>Data de partida:<input type="text" name="start_date"></label>
  <label>Lugares disponiveis:<input type="text" name="available_seats"></label>
  <input type="submit" value="buscar">

</form>

<ul>
	<?php echo $travels_item; ?>
</ul>

<?php echo $html->footer(); ?>
