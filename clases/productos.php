<?php

	class Productos{

		private $con;

		function __construct($con){

		$this->con = $con;

		}

		public function getUnProducto($filtro){
		$query = "SELECT id_producto, nombre, descripcion, categoria_id, cepa_id, marcas_id, precio, activo, destacado, raiting, m.marca as nombreMarca, c.cepa as nombreCepa
			FROM productos as p INNER JOIN marcas as m on p.marcas_id = m.id
			INNER JOIN cepa as c on p.cepa_id = c.id_cepa
			WHERE id_producto = $filtro";
			return $this->con->query($query);
		}

		public function getProductos($filtros = array()){


		$query = "SELECT id_producto, nombre, descripcion, categoria_id, cepa_id, marcas_id, precio, activo, destacado, raiting, m.marca as nombreMarca
					FROM productos as p INNER JOIN marcas as m on p.marcas_id = m.id";
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

