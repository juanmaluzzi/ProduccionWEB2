<?php

require_once('../../inc/mysql_login.php');
require_once('../../inc/config.php');
require_once('../../clases/categoria.php');
$Categorias = new Categoria($con);
$mensaje = $Categorias->editarCategoria($_POST["id"],$_POST["categoria"]);
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