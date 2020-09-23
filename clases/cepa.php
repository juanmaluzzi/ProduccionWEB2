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
	}

?>