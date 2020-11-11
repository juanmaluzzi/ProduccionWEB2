<?php
    require_once("../../config/config.php");
    require_once("../../config/funciones.php");

$mail = $_GET["id"];
$usuario = $_POST["usuario"];
$perfil = $_POST["perfil"];
$password = $_POST["password"];

if($perfil == "on"):
$perfil = "admin";
else:
$perfil = "usuario";
endif;

$password = password_hash($password, PASSWORD_DEFAULT);

if(!$usuario == ""):
file_put_contents(RUTA_USUARIOS . "/$mail/usuario.txt", $usuario);
endif;
if(!$perfil == ""):
file_put_contents(RUTA_USUARIOS . "/$mail/perfil.txt", $perfil);
endif;
if(!$password == ""):
file_put_contents(RUTA_USUARIOS . "/$mail/password.txt", $password);
endif;
header("Location:../index.php?seccion=abmusuarios&estado=ok&ok=usr_editado");
die();
?>
    