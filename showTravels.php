
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


$travels = $travel->find();

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
              <b>Partida:</b> ' . $travel['dataDePartida'] . ' ' . $travel['horarioDePartida'] . '
              <b>Lugares Disponíveis:</b> ' . $availableSeats  . '
            <a href="takeRide.php?travel=' . $travel['idViagem'] . '">
              Carona
            </a>
            <a href="travelDetails.php?travel=' . $travel['idViagem'] . '">
              Detalhes
            </a>
					</li>
				';
}

?>

<ul>
	<?php echo $travels_item; ?>
</ul>

<?php echo $html->footer(); ?>
