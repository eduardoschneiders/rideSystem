<?php
  session_start();
  include ("Includes/config.php");
  include("Includes/Classes/Ride.class.php");
  include("Includes/Classes/Person.class.php");

  $travel = $_GET['travel'];
  $ride = new Ride();
  $person = new Person();
  $html = new Html();


  $rides = $ride->find(array('idViagem' => $travel));

  foreach ($rides as $ride) {
    $p1 = $person->find($ride['idPessoaCaroneiro']);
    $li .= '<li>' . $p1[0]['nome'] . '</li>';
  }

  echo $html->header();
?>

<ul>
  <?php echo $li; ?>
</ul>

<?php echo $html->footer(); ?>
