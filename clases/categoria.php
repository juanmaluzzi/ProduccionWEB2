<?php

	class Categoria{  

		private $con;

		function __construct($con){

		$this->con = $con;

		}
		public function getCategoria(){

		$query = "SELECT * FROM categoria";
		return $this->con->query($query);

	
	

	}	
	}

?>