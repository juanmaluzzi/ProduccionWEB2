


<?php

	class Productos{

		private $con;

		function __construct($con){

		$this->con = $con;

		}

		public function getUnProducto($filtro = array()){
			$query = "SELECT * FROM productos WHERE id_producto = $filtro";
		}

		public function getProductos($filtro = array()){

		$query = "SELECT * FROM productos";


		if (!empty($filtro['cepa'])){

		$query .= 'WHERE id = '.$filtro['cepa'];
		
		}


		
		return $this->con->query($query);
		
	
		}
		
	}

?>

