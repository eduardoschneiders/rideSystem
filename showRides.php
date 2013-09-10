
<?php
header("Content-type: text/html; charset=utf-8");
include ("Includes/Classes/Ride.class.php");
include ("Includes/Classes/City.class.php");
include ("Includes/Classes/Person.class.php");
include ("Includes/config.php");

$ride = new Ride();
$city = new City();
$person = new Person();

$rides = $ride->find();

foreach ($rides as $key => $ride) {
	$from = $city->find($ride['idMunicipioDestino']);
	$to = $city->find($ride['idMunicipioOrigem']);
	$driver = $person->find($ride['idPessoaMotorista']);

	$rides_item .= '
					<li>
						<b>De:</b> ' . $from[0]['nome'] . '
						<b>Até:</b> ' . $to[0]['nome'] . '
						<b>Motorista:</b> ' . $driver[0]['nome'] . '
						<b>Partida:</b> ' . $ride['dataDePartida'] . ' ' . $ride['horarioDePartida'] . '
						<b>Lugares Disponíveis:</b> ' . $ride['assentosDisponiveis'] . '
					</li>
				';
}

?>

<ul>
	<?php echo $rides_item; ?>
</ul>