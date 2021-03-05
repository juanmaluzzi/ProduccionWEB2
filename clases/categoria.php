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

			$query = "SELECT count(1) AS cantidad FROM categoria WHERE id = '".$id."' ;";
			$consulta = $this->con->query($query)->fetch();
			
			if ($consulta->cantidad == 0){
			$sql = "DELETE FROM categoria WHERE id = '" . $id . "';";
			
			$this->con->exec($sql);
			return 1;
			}		
			return 'Categoria eliminada';
			
			}

			public function editarCategoria($id){
		
				$query = "SELECT count(1) AS cantidad FROM categoria WHERE id = '" . $id . "' ;";
				$consulta = $this->con->query($query)->fetch();
				$sql = "UPDATE categoria SET habilitado = 1 WHERE id = '" . $id . "';";
				
				$this->con->exec($sql);
				return 'Categoria editada'; 

				}
	}

?>