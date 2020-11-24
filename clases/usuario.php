<?php

	class Usuario{  

		private $con;

		function __construct($con){

		$this->con = $con;

        }
		
        public function addUsr($usuario,$password,$perfil,$email){

			$password = password_hash($password, PASSWORD_DEFAULT);
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

		public function getUsr($usr){
			$query = "SELECT * FROM usuarios WHERE usr = '$usr';";
			return $this->con->query($query);
		}

		public function editarUsr($id,$nomUsr,$password,$perfil,$email){

			foreach($this->getUsr($id) as $usuario){

				if(empty($nomUsr)){
					$unoUsr = $usuario['usr'];
				}
				if(empty($password)){
					$password = $usuario['pass'];
				}
				if(empty($perfil)){
					$perfil = $usuario['usr_perfil'];
				}
				if(empty($email)){
					$email = $usuario['email'];
				}

				$query = "UPDATE usuarios SET usr = '$nomUsr', pass='$password',usr_perfil = '$perfil', email='$email' WHERE id_usr = '$id' ; ";
				$this->con->exec($query);
				
				return 'Usuario modificado';				
			}
			

		}
		
	}
	

?>