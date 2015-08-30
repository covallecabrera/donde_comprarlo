<?php
require("../class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = ""; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = ""; // Correo completo a utilizar
$mail->Password = ""; // Contraseña
$mail->Port = 25; // Puerto a utilizar
$mail->From = "facoovalle@gmail.com"; // Desde donde enviamos (Para mostrar)
$mail->FromName = "ELSERVER.COM";
$mail->AddAddress("facoovalle@hotmail.es"); // Esta es la dirección a donde enviamos
$mail->AddCC("cuenta@dominio.com"); // Copia
$mail->AddBCC("cuenta@dominio.com"); // Copia oculta
$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = "Titulo"; // Este es el titulo del email.
$body = "sad";
$body .= "Acá continuo el <strong>mensaje</strong>";
$mail->Body = $body; // Mensaje a enviar
$mail->AltBody = "Hola mundo. Esta es la primer línean Acá continuo el mensaje”; // Texto sin html";
//$mail->AddAttachment("imagenes/imagen.jpg", "imagen.jpg");
$exito = $mail->Send(); // Envía el correo.

if($exito){
echo "El correo fue enviado correctamente.";
}else{
echo "Hubo un inconveniente. Contacta a un administrador.";
}
?>