<?php

	class Usuario{  

		private $con;

		function __construct($con){

		$this->con = $con;

        }
        
        public function addUsr(){
            $query = "INSERT INTO usuarios VALUES(null,$_POST[usuario],$_POST[password],$_POST[perfil]);";
            return $this->con->query($query);
        }

        public function getPerfil(){
            $query = "SELECT nombre_perfil FROM perfiles ;";
            return $this->con->query($query);
        }
	/*	public function getCategoria($filtro = array()){

		$query = "SELECT * FROM categoria";
		return $this->con->query($query);
		}	

		public function getNombreCate($id){
			$query = "SELECT categoria FROM categoria WHERE id = ".$id;
			return $this->con->query($query);	
		}
    */
    }

?>