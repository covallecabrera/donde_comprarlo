<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Donde Comprarlo</title>

    </head>
    <body></body>
</html>

<?php
require_once('db_conexion.php');
	$id_empresa = $_GET['id'];
	$estado = "Validada";
	$result = mysqli_query($con,"update empresa set estado_empresa = '".$estado."' where id_empresa = ".$id_empresa."");
 	mysqli_close($con);//cerramos la conexión

	echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
?>

