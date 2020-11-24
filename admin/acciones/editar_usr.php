<?php
require_once '../../inc/mysql_login.php'; 
require_once '../../inc/config.php';
require_once('../../clases/usuario.php');

$Usuario = new Usuario($con); 

$email = $_POST["email"];
$perfil = $_POST["perfil"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];

if(!isset($perfil)):
    $perfil = 3;
    endif;

$mensaje = $Usuario->addUsr($usuario,$password,$perfil,$email);
  print($mensaje);

  header("Location:../index.php?seccion=abmusuarios");
die();