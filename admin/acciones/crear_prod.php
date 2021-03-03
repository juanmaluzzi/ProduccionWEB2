<?php
require_once('../../inc/mysql_login.php');
require_once('../../inc/config.php');
require_once('../../clases/productos.php');
$Productos = new Productos($con);
$mensaje = $Productos->crearProducto($_POST["nombre"], $_POST["descripcion"], $_POST["idCat"], $_POST["idCepa"], $_POST["idBod"], $_POST["precio"]);
echo $mensaje;
print_r($_POST);

//************CREAR CARPETA E IMAGEN 

//VALIDA CAMPO OBLIGATORIOS
if(empty($_POST["nombre"]) || $_FILES["imagen"]["size"] == "0" ):
    header("Location:../index.php?seccion=nuevo_prod&estado=error&error=campos_obligatorios");
    die();
endif;

//GUARDA ARRAY EN VARIABLE $IMAGEN
$imagen = $_FILES["imagen"];

//VALIDA QUE SEA .PNG
if($imagen["type"] != "image/png"):
    header("Location:../index.php?seccion=nuevo_prod&estado=error&error=formato_imagen");
    die();
endif;

//ASIGNA EL VALOR DEL ULTIMO ID +1 PARA CREAR LA CARPETA
$nombreCarpeta = $_POST["id"];

//VALIDA QUE LA CARPETA NO EXISTA
if(is_dir("../../images/$nombreCarpeta")):
    header("Location:../index.php?seccion=nuevo_prod&estado=error&error=carpeta_existe");
    die();
endif;



//CREA LA CARPETA CON EL ID
mkdir("../../images/$nombreCarpeta");

//MUEVE EL ARCHIVO DESDE EL TEMP A LA CARPETA DE LA WEB
move_uploaded_file($imagen["tmp_name"],"../../images/$nombreCarpeta/$nombreCarpeta.png");

header("Location:../index.php?seccion=listado_prod&estado=ok&ok=prod_creado");
die();