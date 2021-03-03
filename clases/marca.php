<?php

	class Marca{  

		private $con;

		function __construct($con){
			$this->con = $con;
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
		
			$query = "UPDATE marca, marcas = '" . $name . "'
			WHERE id = '" .$id. "';";
			
			$this->con->exec($query);
			return 'Cambios realizados'; 

			}
	}


?>