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
        <script src="../jsbincss/js/jquery.timeago.min.js"></script>  
        <script src="../jsbincss/js/prism.js"></script>
        <script src="../jsbincss/bin/materialize.js"></script>
        <script src="../jsbincss/js/init.js"></script>
        <script src="../jsbincss/js/interact.js"></script>

       <!-- CSS-->
        <link href="../jsbincss/css/prism.css" rel="stylesheet">
        <link href="../jsbincss/css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>
<body>
		<h2 class ="center" > Registrando, por favor espere validación.</h2>
	         <div class="progress">
                        <div class="indeterminate"></div>
                    </div>
</body>

<?php

ob_flush(); 
flush(); 
exec('instrucciones bash hacia linux'); // esto es lo que demora unos segundos 

require('../../PHPMailerAutoload.php');

require('validaciones_empresas.php');

require('../db_conexion.php'); 


      if ((isset($_POST['correo']))&&(isset($_POST['rut']))&&(isset($_POST['nombre']))&&(isset($_POST['direccion']))) {

      		$correo=$_POST['correo'];
      		$rut=$_POST['rut'];
      		$nombre=$_POST['nombre'];
      		$direccion=$_POST['direccion'];
      		//$rut = formato_rut($rut1);// Formateo Rut en 11.111.111-1

      		valida_campos_vacios($correo,$direccion,$nombre,$rut); // valido campos vacios

      		valida_rut($rut); // valido rut correcto    

      		valida_correo_valido($correo); // valido correo sea valido como tal

			valida_no_existente_rut($rut,$con); // valido rut no ha sido ingresado
			
			valida_no_existente_correo($correo,$con); // valido correo no ha sido ingresado

			// Transformamos la direccion puesta por la empresa a latitud y longitud para poder se rmostrado en la aplicacion
			$address = $direccion;
			$address = urlencode($address);
			$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=India";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$response = curl_exec($ch);
			curl_close($ch);
			$response_a = json_decode($response);
			$lat = $response_a->results[0]->geometry->location->lat;		
			$long = $response_a->results[0]->geometry->location->lng;
			// Fin de la conversion, tenemos lat y long.




      		$file = $_FILES['url']; //Asignamos el contenido del parametro a una variable para su mejor manejo
			
			$varname = $_FILES['url']['name'];
    		$vartemp = $_FILES['url']['tmp_name'];

			$temName = $file['tmp_name']; //Obtenemos el directorio temporal en donde se ha almacenado el archivo;
			$fileName = $file['name']; //Obtenemos el nombre del archivo
			$fileExtension = substr(strrchr($fileName, '.'), 1); //Obtenemos la extensión del archivo.

			//Comenzamos a extraer la información del archivo
			$fp = fopen($temName, "rb");//abrimos el archivo con permiso de lectura
			$contenido = fread($fp, filesize($temName));//leemos el contenido del archivo
			//Una vez leido el archivo se obtiene un string con caracteres especiales.
			$contenido = addslashes($contenido);//se escapan los caracteres especiales
			fclose($fp);//Cerramos el archivo
			
			//echo $imagen;
			$estado = "Pendiente";
			//Insertando los datos
			//Creando el query para insertar nueva empresa
			$insert_empresa = "INSERT INTO tienda (rut_tienda ,nombre_tienda ,direccion_tienda, correo_tienda,estado_tienda) VALUES ('$rut' ,'$nombre' ,'$direccion', '$correo', '$estado')";
			
			//Ejecutando el Query
			$result = mysqli_query($con, $insert_empresa);
			// Consulta para consultar el ID de la empresa para agregarla a la tabla de imagen empresa

			$consulta_rut = ("Select id_tienda from tienda where rut_tienda = '" . $rut . "' ");
			
			$result = mysqli_query($con,$consulta_rut);

			while ($row = mysqli_fetch_array($result)) {
				
				$id_empresa = $row['id_tienda'];
				
			}
			//////
			//Insertando imagen de empresa en bdd
			$insert_imagen_empresa = "INSERT INTO imagen_empresa_validacion (fileName ,extension , foto, tienda_id_tienda ) VALUES ('$fileName' ,'$fileExtension' ,'$contenido' ,'$id_empresa')";

			//Ejecutando el Query
			$result = mysqli_query($con, $insert_imagen_empresa);

			mysqli_query($con,"INSERT INTO tienda_sucursal (direccion_sucursal,latitud,longitud,tienda_id_tienda) VALUES ('$direccion','$lat','$long','$id_empresa')");

				

            $correo = $_POST['correo'];
			$mail = new PHPMailer();

			// Timeout para el servidor de correos. Por defecto es valor es '10'
			$mail->Timeout=30;
			 
			// Codificación UTF8. Obligado utilizarlo en aplicaciones en Español
			$mail->CharSet = 'UTF-8';

			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->Host = "smtp.live.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
			$mail->Username = "facoovalle@hotmail.es"; // Correo completo a utilizar
			$mail->Password = "misisipi.247111"; // Contraseña
			$mail->Port = 587; // Puerto a utilizar
			$mail->From = "facoovalle@hotmail.es"; // Desde donde enviamos (Para mostrar)
			$mail->FromName = "Administrador";
			$mail->AddAddress("facoovalle@hotmail.es"); // Esta es la dirección a donde enviamos
			$mail->AddCC($correo); // Copia
			//$mail->AddBCC("cuenta@dominio.com"); // Copia oculta
			$mail->IsHTML(true); // El correo se envía como HTML
			$mail->Subject = "Validacion en espera para empresa ".$nombre; // Este es el titulo del email.
			$body = "Se ha recibido una nueva empresa ".$nombre ." Rut: " .$rut. " que espera ser validada ";
			//$body .= "/n Acá continuo el <strong>mensaje</strong>";
			$mail->Body = $body; // Mensaje a enviar
			//$mail->AltBody = "Hola mundo. Esta es la primer línean. Acá continuo el mensaje";//Texto sin html
			$mail->AddAttachment($vartemp, $varname);
			$exito = $mail->Send(); // Envía el correo.

			if($exito){
			echo "El correo fue enviado correctamente.";
			?>
			<script type="text/javascript">
  				alert("Registro exitoso, por favor espere validacion de un administrador!");
			</script>
			<?php

			}else{
			echo "Hubo un inconveniente. Email no fue enviado.";
			?>
			<script type="text/javascript">
			  alert("Hubo un inconveniente con su registro, por favor contacte al administrador!");
			</script>
			<?php
			}
     		
		}
		echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
?>


