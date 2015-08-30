<?php

require_once '../db_config.php';
$server = DB_SERVER;
$bd = DB_DATABASE;
$user = DB_USER;
$pas = DB_PASSWORD;

$con = mysqli_connect($server, $user, $pas, $bd);
?>