<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
date_default_timezone_set('America/Argentina/Buenos_Aires');
try { 
    $con = new PDO ('mysql:host='.$hostname.';dbname='.$database.';port='.$puerto, $username, $password);

 print "conexion buena";
 } 

 catch (PDOException $e)    { 
 print "!NO CONECTA: " .$e->getMessage();

 die ();
 } 
 session_start(); 