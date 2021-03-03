<?php

require_once('../../inc/mysql_login.php');
require_once('../../inc/config.php');
require_once('../../clases/cepa.php');
$Cepa = new Cepa($con);
$mensaje = $Cepa->editarCepa($_POST["id_cepa"],$_POST["cepa"]);
echo $mensaje;
print_r($_POST);

//VALIDA CAMPO OBLIGATORIOS
if(empty($_POST["edit"])):
    header("Location:../index.php?seccion=listado_categorias&estado=error&error=campos_obligatorios");
    die();
endif;

header("Location:../index.php?seccion=listado_categorias");
 die();


 ?>