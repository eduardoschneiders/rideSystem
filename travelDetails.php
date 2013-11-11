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

    $qualification_options = '
                            <b><a href="take_values_hitchhiker_qualifications.php?nota=1&hitchhiker=' . $theRide['idPessoaCaroneiro'] . '&idViagem='. $idtravel .'" >1</b>
                            <b><a href="take_values_hitchhiker_qualifications.php?nota=2&hitchhiker=' . $theRide['idPessoaCaroneiro'] . '&idViagem='. $idtravel .'" >2</b>
                            <b><a href="take_values_hitchhiker_qualifications.php?nota=3&hitchhiker=' . $theRide['idPessoaCaroneiro'] . '&idViagem='. $idtravel .'" >3</b>
                            <b><a href="take_values_hitchhiker_qualifications.php?nota=4&hitchhiker=' . $theRide['idPessoaCaroneiro'] . '&idViagem='. $idtravel .'" >4</b>
                            <b><a href="take_values_hitchhiker_qualifications.php?nota=5&hitchhiker=' . $theRide['idPessoaCaroneiro'] . '&idViagem='. $idtravel .'" >5</b>
    ';

    $li .= '
            <li>'
              . $p1[0]['nome'] .
              $qualification_options .
            '</li>';
  }
  $destinationCity = $city->find($travel[0]['idMunicipioDestino']);
  $originCity = $city->find($travel[0]['idMunicipioOrigem']);

  echo $html->header();
?>

<b>Informações:</b> <br />
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
