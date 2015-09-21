<?php

/*
 * Following code will list all the products
 */
  require('PHPMailerAutoload.php');
// array for JSON response
    $response = array();

    $correo=$_GET["correo"];
    $nombre=$_GET["nombre"];

    $mail = new PHPMailer();

      // Timeout para el servidor de correos. Por defecto es valor es '10'
      $mail->Timeout=30;
       
      // Codificación UTF8. Obligado utilizarlo en aplicaciones en Español
      $mail->CharSet = 'UTF-8';

      $mail->IsSMTP();
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls';
      $mail->Host = "mail.donde-comprarlo.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
      $mail->Username = "administrador@donde-comprarlo.com"; // Correo completo a utilizar
      $mail->Password = "misisipi2471"; // Contraseña
      $mail->Port = 587; // Puerto a utilizar
      $mail->From = "administrador@donde-comprarlo.com"; // Desde donde enviamos (Para mostrar)
      $mail->FromName = "Administrador";
      $mail->AddAddress($correo); // Esta es la dirección a donde enviamos
    //  $mail->AddCC($correo); // Copia
      //$mail->AddBCC("cuenta@dominio.com"); // Copia oculta
      $mail->IsHTML(true); // El correo se envía como HTML
      $mail->Subject = "Registro Exitoso en Donde Comprarlo "; // Este es el titulo del email.
      $body = "Estimado ".$nombre . ", se ha registrado correctmente en Donde Comprarlo. ";
      //$body .= "/n Acá continuo el <strong>mensaje</strong>";
      $mail->Body = $body; // Mensaje a enviar
      //$mail->AltBody = "Hola mundo. Esta es la primer línean. Acá continuo el mensaje";//Texto sin html
     // $mail->AddAttachment($vartemp, $varname);
      $exito = $mail->Send(); // Envía el correo.

 
    $response["success"] = 1;
    echo json_encode($response);  

?>
