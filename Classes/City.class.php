
<?php

	class City {

		private $nameCity;
		private $uf;

		public function setNameCity ($auxNameCity){
			$this->nameCity = $auxNameCity;
		}

		public function setUf ($auxUf){
			$this->uf = $auxUf;
		}

		public function insertCity($connection) {

        	$query = ("insert into Municipio (nome,uf) values('" . $this->nameCity . "','" . $this->uf . "')");
        	$sql = mysql_query($query, $connection);
        	return ($sql);
    	}

    	public function listCity($connection) {

        	$query = ("SELECT nome,idMunicipio FROM Municipio");
        	$sql = mysql_query($query, $connection);
        	$numeroLinhas = mysql_affected_rows($connection);
         
        	$linhas = array();
        	for ($i = 0; $i < $numeroLinhas; $i++) {
            	$linha = mysql_fetch_array($sql);
 
            	$linhas[] = $linha;
       		 }
        	return $linhas;
        }



	}
?>


