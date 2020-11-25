<?php

include ('../../inc/mysql_login.php');
$con = new mysqli($hostname,$database,$username,$password,$puerto);
$consulta ='';
function consulta(){

    global $con, $consulta;

    $sql= "SELECT * FROM comentarios";
    return $con -> query ($sql);
}


function borrar ($id){
global $con;
$sql= "DELETE FROM comentarios WHERE comentarios_id=$id";
$con->query($sql);
}



header('Location : seccion=listado_comentarios');
$id = isset ($_GET['comentarios_id']) ? $_GET['comentarios_id'] : 0; 
borrar ($id);
die();

?>

