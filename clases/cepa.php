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
			$query = 'SELECT cepa FROM cepa WHERE id_cepa = '.$id;
			return $this->con->query($query);
		}
	}

	

?>