<?php

require_once('../../inc/mysql_login.php');
require_once('../../inc/config.php');
require_once('../../clases/marca.php');
$Marca = new Marca($con);
$mensaje = $Marca->editarMarca($_POST["id"],$_POST["marca"]);
echo $mensaje;
print_r($_POST);

//VALIDA CAMPO OBLIGATORIOS
if(empty($_POST["edit"])):
    header("Location:../index.php?seccion=listado_marcas&estado=error&error=campos_obligatorios");
    die();
endif;

header("Location:../index.php?seccion=listado_marcas");
 die();


 ?>