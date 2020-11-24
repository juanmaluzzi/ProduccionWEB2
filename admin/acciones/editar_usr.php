<?php
require_once '../../inc/mysql_login.php'; 
require_once '../../inc/config.php';
require_once('../../clases/usuario.php');

$Usuario = new Usuario($con); 

$email = $_POST["email"];
$perfil = $_POST["perfil"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];

print_r($_POST);
echo 'Email: ' .$email.
' <br>Perfil: '.$perfil.
' <br>Usuario: '.$usuario.
' <br>Password: '.$password.'';

$Usuario->editarUsr($_GET['id'],$usuario,$password,$perfil,$email);

//  header("Location:../index.php?seccion=abmusuarios");
//die();