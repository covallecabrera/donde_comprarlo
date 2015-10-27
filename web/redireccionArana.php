<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Balanced
Description: A two-column, fixed-width design suitable for blogs and small websites.
Version    : 1.0
Released   : 20090927

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Donde Comprarlo</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="jsbincss/js/jquery.timeago.min.js"></script>  
        <script src="jsbincss/js/prism.js"></script>
        <script src="jsbincss/bin/materialize.js"></script>
        <script src="jsbincss/js/init.js"></script>
        <script src="jsbincss/js/interact.js"></script>

       <!-- CSS-->
        <link href="jsbincss/css/prism.css" rel="stylesheet">
        <link href="jsbincss/css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>
<body>
		<h2 class ="center" > Cargando Productos, por favor espere.</h2>
	         <div class="progress">
                        <div class="indeterminate"></div>
                    </div>
</body>
<?php

ob_flush(); 
flush(); 
exec('instrucciones bash hacia linux'); // esto es lo que demora unos segundos 


require ('db_conexion.php');
require 'rutas.php';
//Lo primerito, creamos una variable iniciando curl, pasándole la url

$url1 = $_GET["url"];
$script = '';

if ($url1 == ''){
                 ?>
            <script type="text/javascript">
                    alert("Por favor, Ingrese URL!");
                    window.close();

            </script>                   
            <?php
}




$result=mysqli_query($con, "Select * from sitio_soportado");

while ($row = mysqli_fetch_array($result)){
	if (strstr(strtoupper($url1),strtoupper($row["sitio_nombre"]))){
		$script = $row["direccion_script"];
	}
}

if ($script == ''){
	?>
	        <script type="text/javascript">
	  				alert("Sitio ingresado no es soportado!");
	  				// window.close();
	  				window.history.back();
			</script>           		
	        <?php
}

$ch = curl_init($ruta_redireccion_arana.$script);

//especificamos el POST (tambien podemos hacer peticiones enviando datos por GET
curl_setopt ($ch, CURLOPT_POST, 1);
 
//le decimos qué paramáetros enviamos (pares nombre/valor, también acepta un array)
curl_setopt ($ch, CURLOPT_POSTFIELDS, "url=".$url1);
 
//le decimos que queremos recoger una respuesta (si no esperas respuesta, ponlo a false)
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
 
//recogemos la respuesta
$respuesta = curl_exec ($ch);
 echo  $respuesta;
//o el error, por si falla
$error = curl_error($ch);
 
//y finalmente cerramos curl
curl_close ($ch);

?>