<?php
require_once('../../inc/mysql_login.php');
require_once('../../inc/config.php');

require_once('../../clases/categoria.php');
$Categoria = new Categoria($con);
require_once('../../clases/cepa.php');
$Cepa = new Cepa($con);
require_once('../../clases/marca.php');
$Marca = new Marca($con);

if(isset($_POST['nuevaCat'])){
    $mensaje = $Categoria->nuevaCategoria($_POST['nuevaCat']); 
}

if(isset($_POST['nuevaCepa'])){
    $mensaje = $Cepa->nuevaCepa($_POST['nuevaCepa']);
}

if(isset($_POST['nuevaBod'])){
    $mensaje = $Marca->nuevaBodega($_POST['nuevaBod']);
}

header("Location: ../index.php?seccion=nuevo_prod");
die();

?>