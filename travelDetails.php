<?php
  session_start();
  include ("Includes/config.php");
  include("Includes/Classes/Ride.class.php");
  include("Includes/Classes/Person.class.php");
  include("Includes/Classes/Travel.class.php");
  include("Includes/Classes/City.class.php");

  $idtravel = $_GET['travel'];
  $ride = new Ride();
  $travel = new Travel();
  $person = new Person();
  $city = new City();
  $html = new Html();


  $travel = $travel->find($idtravel);
  $rides = $ride->find(array('idViagem' => $idtravel));


  foreach ($rides as $theRide) {
    $p1 = $person->find($theRide['idPessoaCaroneiro']);
    $li .= '<li>' . $p1[0]['nome'] . '</li>';
  }
  $destinationCity = $city->find($travel[0]['idMunicipioDestino']);
  $originCity = $city->find($travel[0]['idMunicipioOrigem']);

  echo $html->header();
?>

Informações: <br />
Cidade Origem: <?php echo $originCity[0]['nome']?><br />
Cidade Destino: <?php echo $destinationCity[0]['nome']?><br />
Data de partida: <?php echo Util::convertDate($travel[0]['dataDePartida']);?><br />
Horário de partida: <?php echo $travel[0]['horarioDePartida'];?><br />
Assentos disponiveis: <?php echo $travel[0]['assentosDisponiveis'] - count($ride->find(array('idViagem' => $idtravel)));?><br />
Preço: <?php echo $travel[0]['preco'];?><br />
Observacao: <?php echo $travel[0]['observacao'];?><br />


Pessoas cadastradas na carona:<b />
<ul>
  <?php echo $li; ?>
</ul>

<?php echo $html->footer(); ?>
