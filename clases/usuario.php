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
			
			$query = "INSERT INTO usuarios (id,usuario,password,user_perfil,email) VALUES('0','$usuario','$password','$perfil','$email');";
			$this->con->exec($query);
			return 'ok';

        }

        public function getPerfiles(){
            $query = "SELECT * FROM perfiles;";
            return $this->con->query($query);
		}
		
		public function getUsrs(){
            $query = "SELECT usuario, user_perfil, email, id FROM usuarios;";
            return $this->con->query($query);
		}

		public function borrarUsr($id){
			$query = "DELETE FROM usuarios WHERE id = $id;";
			$this->con->exec($query);
			return 'Usuario borrado';
		}

		public function getUsr($usr){
			$query = "SELECT * FROM usuarios WHERE usuario = '$usr';";
			return $this->con->query($query);
		}

		public function editarUsr($id,$nomUsr,$password,$perfil,$email){

			foreach($this->getUsr($id) as $usuario){

				if(empty($nomUsr)){
					$unoUsr = $usuario['usuario'];
				}
				if(empty($password)){
					$password = $usuario['password'];
				}
				if(empty($perfil)){
					$perfil = $usuario['user_perfil'];
				}
				if(empty($email)){
					$email = $usuario['email'];
				}

				$query = "UPDATE usuarios SET usuario = '$nomUsr', password='$password',user_perfil = '$perfil', email='$email' WHERE id = '$id' ; ";
				$this->con->exec($query);
				
				return 'Usuario modificado';				
			}
			

		}
		
	}
	

?>