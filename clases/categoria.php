<?php

	class Categoria{  

		private $con;

		function __construct($con){

		$this->con = $con;

		}
		public function getCategoria($filtro = array()){

		$query = "SELECT * FROM categoria";
		return $this->con->query($query);
		}	

		public function getNombreCate($id){
			$query = "SELECT categoria FROM categoria WHERE id = '".$id."';";
			return $this->con->query($query);	
		}

	
		public function borrarCategoria($id){

			$query = "SELECT count(1) AS cantidad FROM categoria WHERE id = ".$id." ;";
			$consulta = $this->con->query($query)->fetch();
			
			
			$sql = "DELETE FROM categoria WHERE id = '" . $id . "';";
			
			$this->con->exec($sql);
			return $sql;
			
			}
			public function editarCategoria($id,$name){
		
				$query = "UPDATE categoria SET habilitado = 1 , categoria = '" . $name . "'
				WHERE id = '" .$id. "';";
				
				$this->con->exec($query);
				return 'Cambios realizados'; 

				}
				
				public function saveCategoria($datos){
		
					$query = "INSERT INTO categoria(categoria)
			
					VALUES ('".$datos."');";
			
					if ($this->con->exec($query)>0) {
			
					return 'Tu categoria fue guardada';
			
					}else{
			
					return 'Error, vuelva a intentar';
					
					}
					}

				
		public function availableCat($id){
		
			$query = "SELECT count(1) AS cantidad FROM categoria WHERE id = '" . $id . "' ;";
			$consulta = $this->con->query($query)->fetch();
			$sql = "UPDATE categoria SET habilitado = 1 WHERE id = '" . $id . "';";
			
			$this->con->exec($sql);
			return 'Categoria Habilitada'; 

			}
				
				
				}

?>