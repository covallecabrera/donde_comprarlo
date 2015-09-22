<?php


require_once('../db_conexion.php'); 
require('../../PHPMailerAutoload.php');
require('validaciones_empresas.php');



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
			$insert_empresa = "INSERT INTO empresa (rut_empresa ,nombre_empresa ,direccion_empresa, correo_empresa,estado_empresa) VALUES ('$rut' ,'$nombre' ,'$direccion', '$correo', '$estado')";
			
			//Ejecutando el Query
			$result = mysqli_query($con, $insert_empresa);
			
			// Consulta para consultar el ID de la empresa para agregarla a la tabla de imagen empresa

			$consulta_rut = ("Select id_empresa from empresa where rut_empresa = '" . $rut . "' ");
			
			$result = mysqli_query($con,$consulta_rut);

			while ($row = mysqli_fetch_array($result)) {
				
				$id_empresa = $row['id_empresa'];
				
			}
			//////
			//Insertando imagen de empresa en bdd
			$insert_imagen_empresa = "INSERT INTO imagen_empresa_validacion (fileName ,extension , foto, empresa_id_empresa ) VALUES ('$fileName' ,'$fileExtension' ,'$contenido' ,'$id_empresa')";

			//Ejecutando el Query
			$result = mysqli_query($con, $insert_imagen_empresa);
			
			mysqli_close($con);//cerramos la conexión
		

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


