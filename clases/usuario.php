<?php

	class Usuario{  

		private $con;

		function __construct($con){

		$this->con = $con;

        }
		
        public function addUsr($usuario,$password,$perfil,$email){

			$salt = password_hash($password, PASSWORD_BCRYPT);
			
			$password .= $salt;

			$password = hash('md5',$password);

			switch($perfil){
				case "Admin": $perfil = 1;
			break;	
				case "Vendedor": $perfil = 2;
			break;
				case "Cliente": $perfil = 3;
			break;
		}
			
			$query = "INSERT INTO usuarios (id_usr,usr,pass,usr_perfil,email) VALUES('0','$usuario','$password','$perfil','$email');";
			$this->con->exec($query);
			return 'ok';

        }

        public function getPerfiles(){
            $query = "SELECT * FROM perfiles;";
            return $this->con->query($query);
		}
		
		public function getUsrs(){
            $query = "SELECT usr, usr_perfil, email, id_usr FROM usuarios;";
            return $this->con->query($query);
		}

		public function borrarUsr($id){
			$query = "DELETE FROM usuarios WHERE id_usr = $id;";
			$this->con->exec($query);
			return 'Usuario borrado';
		}
		
		
	}
	

?>