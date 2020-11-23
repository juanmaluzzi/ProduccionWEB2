<?php

require_once("../config/config.php");
require_once("../config/funciones.php");


if(empty($_POST["usuario"]) || empty($_POST["password"]) || empty($_POST["email"])):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Los campos email y password son obligatorios";

    header("Location: ../index.php?seccion=login");
    die();
endif;

$usuario = $_POST["usuario"];
$email = $_POST["email"];
$password = $_POST["password"];


if(strpos($email,"@") === false)
    $email = true;
else
    $email = false;

if($usuario):
    $usuarios = glob(RUTA_USUARIOS . "/*/usuario.txt");

    foreach($usuarios as $nombreUsuario):
        $usr = file_get_contents($nombreUsuario);

        if($usr == $email){
            $usuarioLogin = $usr;
            break;
        }

    endforeach;

    if(isset($usuarioLogin)){
        $email = dirname($nombreUsuario);
        $email = explode(RUTA_USUARIOS . "/", $email)[1];
    }

endif;

$passwordAnterior = file_get_contents(RUTA_USUARIOS . "/$email/password.txt");

if(!is_dir(RUTA_USUARIOS . "/$email") || !password_verify($password,$passwordAnterior)):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Los datos ingresados son incorrectos";

    header("Location:../index.php?seccion=login");

    die();
endif;

$perfil = file_get_contents(RUTA_USUARIOS . "/$email/perfil.txt");
$usuario = file_get_contents(RUTA_USUARIOS . "/$email/usuario.txt");


$_SESSION["usuario"] = [
    "usuario" => $usuario,
    "email" => $email,
    "perfil" => $perfil
];


if($perfil == "admin"):
    header("Location: ../index.php?seccion=landing");
    die();
else:
    header("Location: ../index.php?seccion=landing");
    die();
endif;