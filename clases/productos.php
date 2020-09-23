


<?php

	class Productos{

		private $con;

		function __construct($con){

		$this->con = $con;

		}

		public function getProductos(){

		$query = "SELECT * FROM productos";


		if (!empty($filtro['categoria_id'])){

		$query .= 'WHERE id = '.$filtro['categoria_id'];
		
		}


		
		return $this->con->query($query);
		
	
		}
		
	}

?>

