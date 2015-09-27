<?php

require ('db_conexion.php');
//Lo primerito, creamos una variable iniciando curl, pasándole la url

$url1 = $_POST["url"];
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
	  				alert("No se ha encontrado sitio con script para esa URl!");
	  				window.close();
			</script>           		
	        <?php
}

$ch = curl_init("http://localhost/donde_comprarlo/web/".$script);

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