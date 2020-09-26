


<?php

	class Productos{

		private $con;

		function __construct($con){

		$this->con = $con;

		}

		public function getUnProducto($filtro){
			$query = "SELECT * FROM productos  WHERE id_producto = $filtro";
			return $this->con->query($query);
		}

		public function getProductos($filtros = array()){


		$query = "SELECT * FROM productos";
		$where= array();
		if (!empty($filtro['cepa']) AND empty ($filtro ['marca'])){
		$query .= 'cepa_id = '.$filtro ['cepa'];

		}elseif (!empty($filtro['marca']) AND empty ($filtro ['cepa'])){
		$query .= 'marcas_id = '.$filtro ['marca'];

		}elseif (!empty($filtro['marca']) AND !empty ($filtro ['cepa'])){
		$query .= 'marcas_id = '.$filtro ['marca'].' AND marcas_id ='.$filtro['marca'];
			
			}


		
		return $this->con->query($query);
		
	
		}
		
	}

?>

