
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
?>


<form method="post" action="take_values_car.php" enctype="multipart/form-data">

    Placa:      <input type="text" name="plate" value="<?php echo $car[0]['placa']?>"><br />
    Descrição:  <input type="text" name="description" value="<?php echo $car[0]['descricao']?>"><br />
    Ano:        <input type="text" name="year" value="<?php echo $car[0]['ano']?>"><br />
    Cor:        <input type="text" name="color" value="<?php echo $car[0]['cor']?>"><br />
    Foto:       <input type="file" name="photo" value="<?php echo $car[0]['placa']?>"><br />
    <input type="hidden" name="idCar" value="<?php echo $car[0]['idCarro']?>">
    <input type="hidden" name="idPerson" value="<?php echo $car[0]['idPessoa']?>">
    <img src="Photos/Cars/<?php echo $car[0]['fotografia']?>"><br /><br />


    <input type="submit" name="save" value="save">
</form>



<?php echo $html->footer(); ?>
