
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

if($driver)
  $restriction = array('idPessoaMotorista' => $driver);

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
            <b><a href="take_values_qualifications.php?nota=1&motorista=' . $travel['idPessoaMotorista'] . '">1</b>
            <b><a href="take_values_qualifications.php?nota=2&motorista=' . $travel['idPessoaMotorista'] . '">2</b>
            <b><a href="take_values_qualifications.php?nota=3&motorista=' . $travel['idPessoaMotorista'] . '">3</b>
            <b><a href="take_values_qualifications.php?nota=4&motorista=' . $travel['idPessoaMotorista'] . '">4</b>
            <b><a href="take_values_qualifications.php?nota=5&motorista=' . $travel['idPessoaMotorista'] . '">5</b>
					</li>
				';
}

echo  $driver[0]['idPessoa'] ;

?>

<ul>
	<?php echo $travels_item; ?>
</ul>

<?php echo $html->footer(); ?>
