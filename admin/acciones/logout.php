<?php
require_once '../../inc/mysql_login.php'; 
require_once '../../inc/config.php';
session_destroy();

header("Location:../index.php");