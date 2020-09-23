


<?php

	class Productos{

		private $con;

		function __construct($con){

		$this->con = $con;

		}

		public function getProductos($filtro = array()){

		$query = "SELECT * FROM productos";


		if (!empty($filtro['marca'])){

		$query .= 'WHERE marcas_id = '.$filtro['marca'];
		
		}


		
		return $this->con->query($query);
		
	
		}
		
	}

?>

