<?php

		class Comentario{
		
		private $con;



		function __construct($con){
			$this->con = $con;
		}
		
		

		public function getComentario($datos){
			$query = "SELECT * FROM 
			comentarios as c INNER JOIN productos as p on p.id_producto=c.producto_id
			INNER JOIN usuarios as u on u.id_usr=c.usuario_id
			WHERE c.producto_id=$datos";
			return $this->con->query($query);
		}



		public function saveComentario($datos = array()){
		
		$query = "INSERT INTO comentarios(comentario,rankeo,fecha,producto_id,comentarios_id,ip,usuario_id)

		VALUES ('".$datos['comentario']."','".$datos['rankeo']."',now(),'".$_GET['productos']."','0','".$_SERVER['REMOTE_ADDR']."','".$_SESSION['user_id']."');";


		if ($this->con->exec($query)>0) {

		return 'Tu comentario fue enviado';

		}else{

		return 'Error, vuelva a intentar';
		
		}
		}


}
?> 