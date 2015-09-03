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
require("../PHPMailerAutoload.php");

	$id_empresa = $_GET['id'];
	$validacion = $_GET['validacion'];


 	//mysqli_close($con);//cerramos la conexión
	$result2 = mysqli_query($con,"select * from empresa where id_empresa =".$id_empresa."");
	while ($row = mysqli_fetch_array($result2)) {
				
		$id_empresa = $row['id_empresa'];
		$nombre_empresa = $row['nombre_empresa'];
		$correo_empresa = $row['correo_empresa'];	
		$rut_empresa = $row['rut_empresa'];
	
	}

	if ($validacion == 'valida'){
		$estado = "Validada";
		$asunto = "Su empresa ha sido validada en Donde Comprarlo ";
		$mensaje = "Estimada empresa ".$nombre_empresa ." Rut: " .$rut_empresa. " su empresa ya ha sido validada por uno de nuestros administradores";
		$tipo_correo = "Correo de Validacion";
	}elseif ($validacion == 'no_valida') {
		$estado = "Rechazada";
		$asunto = "Su empresa ha sido rechazada en Donde Comprarlo ";
		$mensaje = "Estimada empresa ".$nombre_empresa ." Rut: " .$rut_empresa. " su empresa ya ha sido rechazada, por favor pongase en contacto con nosotros.";
		$tipo_correo = "Correo de rechazo";
	
	}

	$result = mysqli_query($con,"update empresa set estado_empresa = '".$estado."' where id_empresa = ".$id_empresa."");

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
			$mail->AddAddress("$correo_empresa"); // Esta es la dirección a donde enviamos
			//$mail->AddCC($correo); // Copia
			//$mail->AddBCC("cuenta@dominio.com"); // Copia oculta
			$mail->IsHTML(true); // El correo se envía como HTML
			$mail->Subject = "$asunto "; // Este es el titulo del email.
			$body = "$mensaje";
			//$body .= "/n Acá continuo el <strong>mensaje</strong>";
			$mail->Body = $body; // Mensaje a enviar
			//$mail->AltBody = "Hola mundo. Esta es la primer línean. Acá continuo el mensaje";//Texto sin html
			//$mail->AddAttachment($vartemp, $varname);
			$exito = $mail->Send(); // Envía el correo.

			if($exito){
			echo "El correo fue enviado correctamente.";
			$estado_correo = "Correo Satisfactorio";
			date_default_timezone_set('America/Argentina/Buenos_Aires'); 
            $fecha = getdate();
			$result3 = mysqli_query($con,"INSERT INTO log_correo_empresa (log_correo, tipo_correo, estado_correo, empresa_id_empresa) VALUES ('".$fecha[year]."-".$fecha[mon]."-".$fecha[mday]." ".$fecha[hours].":".$fecha[minutes].":".$fecha[seconds]."','".$tipo_correo."','".$estado_correo."', '".$id_empresa."')");
			?>
			<script type="text/javascript">
 			 alert("Empresa notificada correctamente!");
			</script>
			<?php
			}else{
			echo "Hubo un inconveniente. Email no fue enviado.";
			$estado_correo = "Correo Erroneo";
			date_default_timezone_set('America/Argentina/Buenos_Aires'); 
            $fecha = getdate();
			$result3 = mysqli_query($con,"INSERT INTO log_correo_empresa (log_correo, tipo_correo, estado_correo, empresa_id_empresa) VALUES ('".$fecha[year]."-".$fecha[mon]."-".$fecha[mday]." ".$fecha[hours].":".$fecha[minutes].":".$fecha[seconds]."','".$tipo_correo."','".$estado_correo."', '".$id_empresa."')");
			?>
			<script type="text/javascript">
 			 alert("Empresa no ha sido notificada!");
			</script>
			<?php
			}
	mysqli_close($con);//cerramos la conexión
	//echo "<script languaje='javascript' type='text/javascript'>history.back();</script>";
	?>
			<script type="text/javascript">
 				// window.history.back();
 				window.location.replace(document.referrer);
			</script>
	<?php
?>

