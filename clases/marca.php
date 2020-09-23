<?php

	class Marca{  

		private $con;

		function __construct($con){

		$this->con = $con;

		}
		public function getMarca($filtro = array()){

		$query = "SELECT * FROM marcas";

	


		return $this->con->query($query);

	
	

	}	
	}

?>