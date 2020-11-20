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
			
			$query = "INSERT INTO usuarios (id_usr,usr,pass,usr_perfil,email) VALUES('0','$usuario','$password','$perfil','$email');";
			$this->con->exec($query);
			return 'ok';

        }

        public function getPerfiles(){
            $query = "SELECT * FROM perfiles;";
            return $this->con->query($query);
		}
		
		public function getUsrs(){
            $query = "SELECT usr, usr_perfil, email FROM usuarios;";
            return $this->con->query($query);
		}
		
		
	}
	

?>