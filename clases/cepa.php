<?php

	class Cepa{  

		private $con;

		function __construct($con){

		$this->con = $con;
		
		}

		public function getCepa(){

		$query = "SELECT * FROM cepa";
		return $this->con->query($query);

	}	
	}

?>