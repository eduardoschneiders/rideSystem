
<?php
include ("Includes/config.php");
include ("Includes/Classes/Car.class.php");
include ("Includes/Classes/Person.class.php");

$car = new Car();
$person = new Person();

$html = new Html();
echo $html->header();




if($driver)
  $restriction = array('idPessoaMotorista' => $driver);

$car = $car->find(array('idPessoa' => $_SESSION['userId']));
$person = $person->find($car[0]['idPessoa']);

$theCar = '
  <ul>
    <li><b>Motorista:</b> ' . $person[0]['nome'] . '</li>
    <li><b>placa:</b> ' . $car[0]['placa'] . '</li>
    <li><b>descricao:</b> ' . $car[0]['descricao'] . '</li>
    <li><b>ano:</b> ' . $car[0]['ano'] . '</li>
    <li><b>cor:</b> ' . $car[0]['cor'] . '</li>
    <li><img src="Photos/Cars/' . $car[0]['fotografia'] . '"></li>
  </ul>
';

echo $theCar;
?>
<a href="editCar.php?car=<?php echo $car[0]['idCarro']?>">Editar</a>



<?php echo $html->footer(); ?>
