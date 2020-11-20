<?php
require_once '../../inc/mysql_login.php'; 
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

  try { 
    $con = new PDO ('mysql:host='.$hostname.';dbname='.$database.';port='.$puerto, $username, $password);

 print "conexion buena";
 } 

 catch (PDOException $e)    { 
 print "!NO CONECTA: " .$e->getMessage();

 die ();
 } 

 require_once('../../clases/usuario.php');

$Usuario = new Usuario($con);

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