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

		public function getPerfil($id){
            $query = "SELECT * FROM perfiles WHERE id_perfil = $id;";
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

		public function getUsrID($id){			
			$query = "SELECT * FROM usuarios WHERE id_usr = '$id';";
			return $this->con->query($query);
		}


		public function editarUsr($id,$nomUsr,$password,$perfil,$email){

			foreach($this->getUsrID($id) as $usuario){

				if(empty($nomUsr)){
					$nomUsr = $usuario['usr'];
				}
				if(empty($password)){
					$password = $usuario['pass'];
				}else{
					$password = password_hash($password, PASSWORD_DEFAULT);
				}
				if(!empty($perfil)){
					switch($perfil){
						case "Admin": $perfil = 1;
					break;	
						case "Vendedor": $perfil = 2;
					break;
						case "Cliente": $perfil = 3;
					break;
				}
				}	else{
					$perfil = $usuario['usr_perfil'];
				}
				if(empty($email)){
					$email = $usuario['email'];
				}

				$query = "UPDATE usuarios SET usr = '".$nomUsr."', pass='".$password."',usr_perfil = '".$perfil."', email='".$email."' WHERE id_usr = '". $usuario['id_usr'] ."' ; ";
				$this->con->exec($query);
				
				return 'Usuario creado';				
			}
			

		}
		
		public function validarPermiso($idPerfil,$codPermiso){
			$query = "SELECT per.codigo_permiso as permiso
						FROM perfil_permisos as pp 
						INNER JOIN permisos as per ON pp.id_permiso_fk = per.id_permiso 
						WHERE pp.id_perfil_fk = " .$idPerfil. " AND per.codigo_permiso = '" .$codPermiso. "' ;" ;
			 
			 foreach($this->con->query($query) as $permiso) {
				if(empty($permiso['permiso'])){ 
				$rta = false;
			 }else{
				 $rta = true;
			 }
			 return $rta;
			}
		}
	}
	

?>