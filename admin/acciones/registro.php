<?php
require_once '../../inc/mysql_login.php'; 
require_once '../../inc/config.php';
require_once('../../clases/usuario.php');

$Usuario = new Usuario($con); 

if(isset($_POST['borrar_usr'])):
  $Usuario->borrarUsr($_POST['borrar_usr']);
  header("Location:../index.php?seccion=abmusuarios");
  die();
endif;

if(empty($_POST["usuario"]) || empty($_POST["password"])):
    header("Location:../index.php?seccion=crearusr&mensaje=camposobligatorios");
    die();
endif;

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