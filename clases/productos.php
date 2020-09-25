


<?php

	class Productos{

		private $con;

		function __construct($con){

		$this->con = $con;

		}

		public function getUnProducto($filtro){
			$query = "SELECT * FROM productos JOIN  WHERE id_producto = $filtro";
			return $this->con->query($query);
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

