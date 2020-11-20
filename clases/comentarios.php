<?php

		class Comentario{
		
		private $con;



		function __construct($con){
			$this->con = $con;
		}
		
		

		public function getComentario($datos){
			$query = "SELECT * FROM 
			comentarios as c INNER JOIN productos as p p.id_producto=c.producto_id
			WHERE c.producto_id=$datos";
			return $this->con->query($query);
		}



		public function saveComentario($datos = array()){
		
		$query = "INSERT INTO comentarios(email,comentario,rankeo,fecha,producto_id,comentarios_id)

		VALUES ('".$datos['email']."','".$datos['comentario']."','".$datos['rankeo']."',now(),'".$_GET['productos']."','0');";


		if ($this->con->exec($query)>0) {

		return 'Tu comentario fue enviado';

		}else{

		return 'Error, vuelva a intentar';
		
		}
		}
}
?> 