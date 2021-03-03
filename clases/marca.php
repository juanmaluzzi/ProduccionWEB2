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
			$query = "SELECT marca FROM marcas WHERE id = $id";
			return $this->con->query($query);
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