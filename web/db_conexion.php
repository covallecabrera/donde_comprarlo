<?php

define('DB_USER', 'covalle'); // db user
define('DB_PASSWORD', ''); // db password (mention your db password here)
define('DB_DATABASE', 'donde_comprarlo'); // database name
define('DB_SERVER', 'localhost'); // db server

//require_once '../db_config.php';

$server = DB_SERVER;
$bd = DB_DATABASE;
$user = DB_USER;
$pas = DB_PASSWORD;

$con = mysqli_connect($server, $user, $pas, $bd);

?>