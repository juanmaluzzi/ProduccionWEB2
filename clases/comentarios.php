<?php
		class Comentario{	
		private $con;



		function __construct($con){
			$this->con = $con;
		}
		
		

		public function getComentario($datos){
			$query = "SELECT * FROM 
			comentarios AS c INNER JOIN productos AS p ON p.id_producto=c.producto_id
			INNER JOIN usuarios AS u ON u.id_usr=c.usuario_id
			WHERE c.producto_id=$datos AND c.habilitado=1";
			return $this->con->query($query);
		}

		
		public function saveComentario($datos = array()){
		
		$query = "INSERT INTO comentarios(comentario,rankeo,notas,enlata,fecha,producto_id,comentarios_id,ip,usuario_id)

		VALUES ('".$datos['comentario']."','".$datos['rankeo']."','".$datos['notas']."','".$datos['enlata']."',now(),'".$_GET['productos']."','0','".$_SERVER['REMOTE_ADDR']."','".$_SESSION['user_id']."');";


		if ($this->con->exec($query)>0) {

		return 'Tu comentario fue enviado';

		}else{

		return 'Error, vuelva a intentar';
		
		}
		}


}
?> 