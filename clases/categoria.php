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
			$query = "SELECT categoria FROM categoria WHERE id = ".$id;
			return $this->con->query($query);	
		}
	}

?>