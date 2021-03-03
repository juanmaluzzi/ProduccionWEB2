<?php

	class Marca{  

		private $con;

		function __construct($con){
			$this->con = $con;
		}


		public function borrarMarca($id){

			$query = "SELECT count(1) AS cantidad FROM marcas WHERE id = '".$id."' ;";
			$consulta = $this->con->query($query)->fetch();
			
			
			$sql = "DELETE FROM marcas WHERE id = '" . $id . "';";
			
			$this->con->exec($sql);
			return 'Marca eliminada';
			
			}


		public function getMarca($filtro = array()){
			$query = "SELECT * FROM marcas";
			return $this->con->query($query);
		}
		
		public function getNombreMarca($id){
			$query = "SELECT marca FROM marcas WHERE id = '".$id."';";
			return $this->con->query($query);	
		}


		public function editarMarca($id,$name){
		
			$query = "UPDATE marcas SET marca = '" . $name . "'
			WHERE id = '" .$id. "';";
			
			$this->con->exec($query);
			return 'Cambios realizados'; 

			}

		public function nuevaBodega($nombreBodega){
			$query = "INSERT INTO marcas (id, marca) VALUES ('0', '$nombreBodega');" ;
			if ($this->con->exec($query)>0) {
		
				return 'ok';
			
				}else{
			
				return 'error_datos';
				
				}
		}
	}


?>