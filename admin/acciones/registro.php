<?php
require_once '../../inc/mysql_login.php'; 
require_once '../../inc/config.php';
require_once('../../clases/usuario.php');
$Usuario = new Usuario($con); 

if(isset($_POST['borrar_usr'])):
  $Usuario->borrarUsr($_POST['borrar_usr']);
  ?>