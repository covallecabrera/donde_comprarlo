<?php

require_once '../db_config.php';
$server = DB_SERVER;
$bd = 'donde_comprarlo_copia';
$user = DB_USER;
$pas = DB_PASSWORD;

$con2 = mysqli_connect($server, $user, $pas, $bd);
?>