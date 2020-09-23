


<?php

	class Productos{

		private $con;

		function __construct($con){

		$this->con = $con;

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

