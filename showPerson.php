<?php

	include('Classes/Person.class.php');
	include('Classes/connectionDatabase.Class.php');


	$per = new Person();
	$con = new Connection();


	$people = $per->listarPessoa($con->connect());

?>


<?php foreach ($people as $val) { ?> 

     <p><?php echo $val['nome']?>, <? echo $val['email']?>,<? echo $val['sexo']?>,<? echo $val['telefoneResidencial']?>,<? echo $val['telefoneCelular']?>,<? echo $val['dataDeNascimento']?>,<? echo $val['fumante']?>,<? echo $val['qualificacoesPositivas']?>,<? echo $val['qualificacoesNegativas']?>,<? echo $val['qualificacoesNegativas']?>,<? echo $val['fotografia']?> </p>                                                                           
   

<?php } ?>