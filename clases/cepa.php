<?php

	class Cepa{  

		private $con;

		function __construct($con){
			$this->con = $con;
		}

		public function getCepa($filtro = array()){
			$query = "SELECT * FROM cepa";
			return $this->con->query($query);
		}	

		public function getNombreCepa($id){
			$query = "SELECT cepa FROM cepa WHERE id_cepa = '".$id."';";
			return $this->con->query($query);	
		}


		public function borrarCepa($id){

			$query = "SELECT count(1) AS cantidad FROM cepa WHERE id_cepa = '".$id."' ;";
			$consulta = $this->con->query($query)->fetch();
			
			
			$sql = "DELETE FROM cepa WHERE id_cepa = '" . $id . "';";
			
			$this->con->exec($sql);
			return 'Cepa eliminada';
			
			}

			public function editarCepa($id,$name){
		
				$query = "UPDATE cepa, cepa = '" . $name . "'
				WHERE id_cepa = '" .$id. "';";
				
				$this->con->exec($query);
				return 'Cambios realizados'; 

				}

				public function saveCepa($datos){
		
					$query = "INSERT INTO cepa(cepa)
			
					VALUES ('".$datos['cepa']."');";
			
			
					if ($this->con->exec($query)>0) {
			
					return 'Tu comentario fue enviado';
			
					}else{
			
					return 'Error, vuelva a intentar';
					
					}


	}
}
	

?>