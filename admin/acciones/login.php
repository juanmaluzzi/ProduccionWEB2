<?php
require_once '../../inc/mysql_login.php'; 
require_once '../../inc/config.php';
require_once('../../clases/usuario.php');

$Usuario = new Usuario($con);

if(empty($_POST["usuario"]) || empty($_POST["password"])):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Los campos email y password son obligatorios";

    header("Location: ../index.php?error=camposobligatorios");
    die();
endif;

$usr = $_POST["usuario"];
$password = $_POST["password"];
        
foreach($Usuario->getUsr($usr) as $datosUsr){
    
    if(password_verify($password,$datosUsr['password'])){
        $_SESSION['usuario'] = [
            'nombre' => $datosUsr['usuario'],
            'email' => $datosUsr['email'],
            'perfil' => $datosUsr['user_perfil']
        ];    
        $login = 'true';  
        $_SESSION["estado"] = "logueado";
        $_SESSION["mensaje"] = "Ingreso satisfactorio";
            header("Location:../index.php");  
        }else{
            $login = 'false';
            $_SESSION["estado"] = "error";
            $_SESSION["mensaje"] = "Los datos ingresados son incorrectos";
            header("Location:../index.php?error=camposincorrectos");
        }

    }	