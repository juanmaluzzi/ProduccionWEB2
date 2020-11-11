<?php

require_once("../config/config.php");
require_once("../config/funciones.php");


if(empty($_POST["email"]) || empty($_POST["password"])):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Los campos email y password son obligatorios";

    header("Location:../index.php?seccion=registrate");
    die();
endif;

$email = $_POST["email"];
$password = $_POST["password"];

$nuevoUsuario = explode("@",$email)[0];

$usuario = !empty($_POST["usuario"]) ? $_POST["usuario"] : $nuevoUsuario;

if(is_dir(RUTA_USUARIOS . "/$email")):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El usuario ya existe en nuestro sitio";

    header("Location:../index.php?seccion=registrate");
    die();
endif;

mkdir(RUTA_USUARIOS . "/$email");

file_put_contents(RUTA_USUARIOS . "/$email/usuario.txt", $usuario);

file_put_contents(RUTA_USUARIOS . "/$email/perfil.txt", "usuario");

$password = password_hash($password, PASSWORD_DEFAULT);

file_put_contents(RUTA_USUARIOS . "/$email/password.txt",$password);

$_SESSION["estado"] = "ok";
$_SESSION["mensaje"] = "Ya podés ingresar con los datos con los que te registraste";


header("Location: ../index.php?seccion=login");