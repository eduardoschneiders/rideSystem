
<?php
header("Content-type: text/html; charset=utf-8");
include ("Includes/Classes/City.class.php");
include ("Includes/Classes/Person.class.php");
include ("Includes/config.php");

$city = new City();
$person = new Person();
$html = new Html();

$idPerson = $_GET['idPerson'];
if ($idPerson){
  $thePerson = $person->find($idPerson);
  $input = '<input type="hidden" name="person" value="' . $thePerson[0]['idPessoa'] . '">';

}


echo $html->header();

foreach ($city->find() as $key => $city) {

  $selected = '';
  if ($city['idMunicipio'] == $thePerson[0]['idMunicipio'])
    $selected = 'selected="selected"';

  $city_options .= '<option ' . $selected . ' value="' . $city['idMunicipio'] . '">' . $city['nome'] . '</option>';
}

if ($thePerson[0]['sexo'] == 'm')
  $gender_m = 'checked="checked"';
else
  $gender_f = 'checked="checked"';

if ($thePerson[0]['fumante'] == '1')
  $smoker_y = 'checked="checked"';
else
  $smoker_n = 'checked="checked"';

?>

          <div class="action-title">
            <h1>Editar Perfil</h1>
          </div>
          <div class="span2 offset1" style="margin-top: 65px;">
            <div id="user-thumb-container">
                <img style="max-width: 100px"  class="thumbnail" id="user-image" src="Photos/People/<?php echo $thePerson[0]['fotografia']?>" alt="Fotografia">
                <a href="javascript:void(0)" id="btn_alterar_foto">Alterar foto</a>
            </div>
          </div>

           <!--<div class="span2">-->
          <form method="post" action="take_values_person.php" id="user-login" enctype="multipart/form-data">

            <div>
              <input type="file" name="photo" id="photo" style="display: none"> <br/>
              <?php echo $input; ?>
              <label for="name">Nome Completo: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
              <input type="text" name="name" id="name" value="<?php echo $thePerson[0]['nome']?>" class="form-text required">
            </div>
            <div>
               <label for="username">E-mail: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
               <input type="text" name="email" id="email" value="<?php echo $thePerson[0]['email']?>"class="form-text required">
            </div>
            <div>
               <label for="password">Senha: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
               <input type="password" id="password" class="form-text required">
            </div>
            <div>
               <label for="password">Telefone Residencial: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
               <input type="tel"  name="residentialPhone"  id="residentialPhone" value="<?php echo $thePerson[0]['telefoneResidencial']?>" class="form-text required">
            </div>
            <div>
               <label for="password">Celular: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
               <input type="tel" name="personalPhone" id="personalPhone" value="<?php echo $thePerson[0]['telefoneCelular']?>" class="form-text required">
            </div>
            <div>
               <label for="dataNascimento">Data nascimento: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
               <input type="date" name="birthDate" id="birthDate" value="<?php echo $thePerson[0]['dataDeNascimento']?>" class="form-text required">
            </div>
            <div class="clearfix">
              <label for="cidade">Cidade: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
                <div>
                <select name="city" id="city" onblur="return validarCidade()" class="form-text required">
                  <option value="2">Selecionar</option>
                  <?php echo $city_options ?>
                 </select>
                </div>
              </div>

                <div class="p-top">
                 <label for="fumante">Fumante: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
                <a class="p-right">
                  <input type="radio" name="smoker" value="1" <?php echo $smoker_y; ?> />Sim
                </a>
                <a class="p-right">
                  <input type="radio" name="smoker" value="0" <?php echo $smoker_n; ?>/>Não
                </a>
              </div>
              <div class="p-top">
                  <label for="sexo">Sexo: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
                  <a class="p-right">
                    <input type="radio" name="sexo" value="m" <?php echo $gender_m; ?>/>Masculino
                  </a>
                  <a class="p-right">
                    <input type="radio" name="sexo" value="f" <?php echo $gender_f  ; ?>/>Feminino
                  </a>
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