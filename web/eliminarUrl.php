<?php

require_once('db_conexion.php'); //importamos el archivo de conexión
//Funcion para recuperar el mime



$idImagen = $_GET['id']; //Recuperamos el prametro que contiene el id de la imagen que vamos a consultar.

$result = mysqli_query($con, "Select * from img where idImagen = $idImagen"); //Realizamos una consulta a la imagen seleccionada
$imagen = mysqli_fetch_assoc($result); //recuperamos los registros de la consulta
$contenido = $imagen['binario']; //Obtenemos el contenido almacenado en el campo Binario.

header("Content-type:$mime"); //le indicamos al navegador que tipo de información mostraremos.
print $contenido; //Imprimimos el contenido.

mysqli_close($con); //cerramos la conexión
?>