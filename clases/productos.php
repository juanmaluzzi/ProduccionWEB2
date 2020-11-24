<?php

	class Productos{

		private $con;

		function __construct($con){

		$this->con = $con;

		}


		public function getUnProducto($filtro){
		$query = "SELECT p.id_producto, nombre, descripcion, categoria_id, cepa_id, marcas_id, precio, activo, destacado, raiting, m.marca as nombreMarca, c.cepa as nombreCepa
			FROM productos as p INNER JOIN marcas as m on p.marcas_id = m.id
			INNER JOIN cepa as c on p.cepa_id = c.id_cepa
			WHERE id_producto = $filtro";
			return $this->con->query($query);
		}

		
		public function getComentarioProductos($filtros = array()){

			$query = "SELECT id_producto, nombre, descripcion, categoria_id, cepa_id, marcas_id, precio, activo, destacado, raiting, m.marca as nombreMarca, co.comentario, u.email, u.usuario,co.comentarios_id
						FROM productos as p 
						INNER JOIN marcas as m on p.marcas_id = m.id INNER JOIN categoria as c on p.categoria_id = c.id 
						INNER JOIN comentarios as co on co.producto_id=p.id_producto
						INNER JOIN usuarios as u on u.id=co.usuario_id";
						
						return $this->con->query($query);

																}	

		public function getProductos($filtros = array()){

		$query = "SELECT id_producto, nombre, descripcion, categoria_id, cepa_id, marcas_id, precio, activo, destacado, raiting, m.marca as nombreMarca
					FROM productos as p 
					INNER JOIN marcas as m on p.marcas_id = m.id INNER JOIN categoria as c on p.categoria_id = c.id" ;
					
		//$where = array();

		if(!empty($filtros['cepa']) && !empty($filtros['marca'])){
			$query .= 'WHERE cepa_id = '.$filtros['cepa'].' AND marcas_id = '.$filtros['marca'];
		}elseif(!empty($filtros['cepa'])){
			$query .= 'WHERE cepa_id = '.$filtros['cepa'];
		}elseif(!empty($filtros['marca'])){
			$query .= 'WHERE marcas_id = '.$filtros['marca'];
		
	}
		
		// $ordenamiento = ['AZ','ZA','DESTACADO'];


	if (!empty($filtros['order'])){
		$query .= ' ORDER BY ';
 		if($filtros['order'] == 1){
		$query .= '2 asc';
       }elseif($filtros['order'] == 2){
	   	   $query .= '2 desc';
	   }	
else{
$query .= '9 desc';
}
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

