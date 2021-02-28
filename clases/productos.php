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

		$query = "SELECT id_producto, nombre, descripcion, categoria_id, cepa_id, marcas_id, precio, activo, destacado, raiting, m.marca as nombreMarca, c.cepa as nombreCepa, cat.categoria as nombreCat
					FROM productos as p 
					INNER JOIN cepa as c on p.cepa_id = c.id_cepa
					INNER JOIN marcas as m on p.marcas_id = m.id 
					INNER JOIN categoria as cat on p.categoria_id = cat.id ";
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

		public function editarComentario($id){
		
				$query = "SELECT count(1) AS cantidad FROM comentarios WHERE comentarios_id = '" . $id . "' ;";
				$consulta = $this->con->query($query)->fetch();
				$sql = "UPDATE comentarios SET habilitado = 1 WHERE comentarios_id = '" . $id . "';";
				
				$this->con->exec($sql);
				return 'Comentario agregado'; 

				}

		public function borrarComentario($id){

			$query = "SELECT count(1) AS cantidad FROM comentarios WHERE comentarios_id = '".$id."' ;";
			$consulta = $this->con->query($query)->fetch();
			
			if ($consulta->cantidad != 0){
			$sql = "DELETE FROM comentarios WHERE comentarios_id = '" . $id . "';";
			
			$this->con->exec($sql);
			return 1;
			}
			
			return 'Comentario eliminado';
			
			}

		public function getComentarioProductos($filtros = array()){

			$query = "SELECT id_producto, nombre, descripcion, categoria_id, cepa_id, marcas_id, precio, activo, destacado, raiting, m.marca as nombreMarca, co.comentario, u.email, u.usr,co.comentarios_id, habilitado
						FROM productos as p 
						INNER JOIN marcas as m on p.marcas_id = m.id INNER JOIN categoria as c on p.categoria_id = c.id 
						INNER JOIN comentarios as co on co.producto_id=p.id_producto
						INNER JOIN usuarios as u on u.id_usr=co.usuario_id";
						
						return $this->con->query($query);

																}

		public function getDestacados(){
			$query = "SELECT id_producto, nombre, descripcion, categoria_id, cepa_id, marcas_id, precio, activo, destacado, raiting, m.marca as nombreMarca
			FROM productos as p INNER JOIN marcas as m on p.marcas_id = m.id WHERE destacado = 1 ORDER BY rand() LIMIT 6";
			return $this->con->query($query);
		}


		public function del($id){
				$query = 'SELECT count(1) as cantidad FROM productos where id_producto = ' .$id.';';
				$consulta = $this->con->query($query)->fetch();
		if($consulta->cantidad == 0){
			$sql = 'DELETE FROM productos WHERE id_producto = '.$id. ';'; 
					

			$this->con->exec($sql); 
			return 1;
		}
		return 'Producto eliminado';
			
			
		}

		public function edit($data){
			$id = $data['id_producto'];

			foreach($data as $key => $value){
				if(!is_array($value)){
					if($value != null){	
						$columns[]=$key." = '".$value."'"; 
					}
				}
            }
          
			$sql = "UPDATE productos SET ".implode(',',$columns)." WHERE id_producto = ".$id. ";";
			return $sql;
             
			
	} 
	public function get($id){
	    $query = "SELECT *
		           FROM productos WHERE id_producto = ".$id;
        $query = $this->con->query($query); 
			
		$productos = $query->fetch(PDO::FETCH_OBJ);
			
			
	}
	public function save($data)
	{
		foreach ($data as $key => $value) {
			if (!is_array($value)) {
				if ($value != null) {
					$columns[] = $key;
					$datos[] = $value;
				}
			}
		}
		$sql = "INSERT INTO productos(" . implode(',', $columns) . ") VALUES(" . implode(',', $datos) . "')";

		$this->con->exec($sql);
	}
	}

?>

