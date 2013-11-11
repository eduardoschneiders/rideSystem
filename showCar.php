
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

<div class="action-title">
  <h1>Gerênciar Carros</h1>
</div>
        <div class="span2 offset1" style="margin-top: 50px;">
          <div id="user-thumb-container">
              <img width="100" height="100" class="thumbnail" id="user-image" src="Photos/Cars/<?php echo $car[0]['fotografia']; ?>" alt="Fotografia">
              <a href="javascript:void(0)" id="btn_alterar_foto">Alterar foto</a>
          </div>
        </div>
           <!--<div class="span2">-->
          <form action="take_values_car.php" method="post" id="user-login" enctype="multipart/form-data">
            <div>
               <label for="name">Placa Veículo: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
               <input type="text" id="A7-nroplaca" maxlength="7" size="8" onkeyup="entercodigo(event);" class="form-text required" name="plate" value="<?php echo $car[0]['placa']; ?>">
            </div>
            <div>
               <label for="username">Descrição: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
               <input type="text" id="descricao" class="form-text required" name="description" value="<?php echo $car[0]['descricao']?>">
            </div>
            <div>
               <label for="name">Ano: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
               <input type="text" id="ano" class="form-text required" name="year" value="<?php echo $car[0]['ano']?>">
            </div>
            <div>
              <label for="name">Cor: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
              <input type="text" id="cor" class="form-text required" name="color" value="<?php echo $car[0]['cor']?>">
              <input type="file" name="photo" id="photo" value="<?php echo $car[0]['placa']?>" style="display: none">
              <input type="hidden" name="idCar" value="<?php echo $car[0]['idCarro']?>">
              <input type="hidden" name="idPerson" value="<?php echo $car[0]['idPessoa']?>">
            </div>
            <div class="p-top">
              <input type="submit" value="Salvar" class="form-submit">
            </div>

       </form>



<?php echo $html->footer(); ?>
<script type="text/javascript">
  $("#btn_alterar_foto").click(function(){
    $("#photo").click();
  });
</script>