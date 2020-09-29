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
					FROM productos as p 
					INNER JOIN marcas as m on p.marcas_id = m.id INNER JOIN categoria as c on p.categoria_id = c.id ";
		//$where = array();

		if(!empty($filtros['cepa']) && !empty($filtros['marca'])){
			$query .= 'WHERE cepa_id = '.$filtros['cepa'].' AND marcas_id = '.$filtros['marca'];
		}elseif(!empty($filtros['cepa'])){
			$query .= 'WHERE cepa_id = '.$filtros['cepa'];
		}elseif(!empty($filtros['marca'])){
			$query .= 'WHERE marcas_id = '.$filtros['marca'];
		}

		return $this->con->query($query);
		
		}

		public function getDestacados(){
			$query = "SELECT id_producto, nombre, descripcion, categoria_id, cepa_id, marcas_id, precio, activo, destacado, raiting, m.marca as nombreMarca
			FROM productos as p INNER JOIN marcas as m on p.marcas_id = m.id WHERE destacado = 1 ORDER BY rand() LIMIT 6";
			return $this->con->query($query);
		}
	}

?>

