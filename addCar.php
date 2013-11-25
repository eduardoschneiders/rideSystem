
<?php
header("Content-type: text/html; charset=utf-8");

include ("Includes/Classes/Person.class.php");
include ("Includes/config.php");
include ("Includes/Classes/Login.class.php");

$login = new Login();
$person = new Person();
$html = new Html();

$login->permission();

echo $html->header();

$all_people = $person->find();

foreach ($all_people as $key => $person) {
    $person_options .= '<option  value="' . $person['idPessoa'] . '">' . $person['nome'] . '</option>';
}

?>

<!-- <form method="post" action="take_values_car.php" enctype="multipart/form-data">
    Pessoa:     <select name="idPerson"><?php echo $person_options ?></select></br>
    Placa:      <input type="text" name="plate"></input></br>
    Descrição:  <input type="text" name="description"></input></br>
    Ano:        <input type="text" name="year"></input></br>
    Cor:        <input type="text" name="color"></input></br>



    <input type="submit" name="save" value="save"></input>
</form> -->

<div class="action-title">
            <h1>Gerênciar Carro</h1>
          </div>

        <div class="span2 offset1">
        <div id="user-thumb-container">
            <img width="100" height="100" class="thumbnail" id="user-image" src="C:\Documents and Settings\alexandro_bervian\Desktop\rideSystem\ride\img\carro.jpg" alt="Fotografia">
            <a href="#" id="btn_alterar_foto">Alterar foto</a>
        </div>
        </div>
           <!--<div class="span2">-->
          <form action="#" method="post" id="user-login">
            <div>
              <input type="file" name="photo" id="photo" style="display: none;">
              <label for="name">Placa Veículo: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
              <input type="text" name="plate" id="A7-nroplaca" maxlength="7" size="8" onkeyup="entercodigo(event);" class="form-text required">
            </div>
            <div>
               <label for="username">Descrição: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
               <input type="text" name="description" id="descricao" class="form-text required">
            </div>
            <div>
               <label for="name">Ano: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
               <input type="text" id="ano" name="year" class="form-text required">
            </div>
            <div>
               <label for="name">Cor: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
               <input type="text" name="color" id="cor" class="form-text required">
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