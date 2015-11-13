<?php
require_once('../db_conexion.php'); //importamos el archivo de conexión
//Funcion para recuperar el mime
function fObtenerMime($wfParamCadena){//creamos una función que recibira un parametro en este caso la extensión del archivo
    $fsExtension = $wfParamCadena;	
    if  ($fsExtension =='bmp'){ $mime = 'image/bmp'; }
    if  ($fsExtension =='gif' ){ $mime ='image/gif' ; }
    if  ($fsExtension =='jpe' ){ $mime ='image/jpeg' ; }
    if  ($fsExtension =='jpeg'){ $mime = 'image/jpeg' ; }
    if  ($fsExtension =='jpg' ){ $mime ='image/jpeg'; }
    if  ($fsExtension =='png' ){ $mime = 'image/png'; }    
    return $mime;//en base a su extenxión la function retornara un tipo de mime 
}


	$idImagen = $_GET['id']; //Recuperamos el prametro que contiene el id de la imagen que vamos a consultar.
	
	$result = mysqli_query($con,"Select * from imagen_empresa_validacion where id_imagen = ".$idImagen."");//Realizamos una consulta a la imagen seleccionada
	$imagen =  mysqli_fetch_assoc($result);//recuperamos los registros de la consulta
	$mime = fObtenerMime($imagen['extension']);//Obtenemos el mime del archivo.
	$contenido = $imagen['foto'];//Obtenemos el contenido almacenado en el campo Binario.
	
	header("Content-type:$mime");//le indicamos al navegador que tipo de información mostraremos.
	
	print $contenido; //Imprimimos el contenido.
	mysqli_close($con);//cerramos la conexión


