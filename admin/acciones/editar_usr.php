<?php
require_once '../../inc/mysql_login.php'; 
require_once '../../inc/config.php';
require_once('../../clases/usuario.php');

$Usuario = new Usuario($con); 

$mensaje = $Usuario->editarUsr($_POST["id_usr"],$_POST["usuario"],$_POST["password"],$_POST["perfil"],$_POST["email"]);

header("Location:../index.php?seccion=abmusuarios");
die();