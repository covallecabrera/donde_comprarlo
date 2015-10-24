<?php 
         require_once('../db_conexion.php'); //importamos el archivo de conexión 
        require('../../PHPMailerAutoload.php');


        $id_empresa = $_POST['id_empresa'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $direccion = $_POST['direccion'];

        if($contrasena == ''){
            $contrasena = $_POST['contrasena_empresa'] ;
        }

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

        mysqli_query($con, "UPDATE tienda SET nombre_tienda='".$nombre."',correo_tienda='".$correo."',contrasena_tienda='".$contrasena."',direccion_tienda='".$direccion."'  WHERE id_tienda='".$id_empresa."'");
        mysqli_query($con, "UPDATE tienda_sucursal SET direccion_sucursal='".$direccion."',latitud='".$lat."',longitud='".$long."' WHERE tienda_id_tienda='".$id_empresa."'");
        enviar_correo($correo);
                ?>

            <script type="text/javascript">
                 // window.history.back();
                alert("Cuenta Modificada con exito");
                window.location.replace(document.referrer);

            </script>
        <?php

    

function enviar_correo($correo){

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
            $mail->AddAddress($correo); // Esta es la dirección a donde enviamos
            // $mail->AddCC(); // Copia
            //$mail->AddBCC("cuenta@dominio.com"); // Copia oculta
            $mail->IsHTML(true); // El correo se envía como HTML
            $mail->Subject = "Los datos de su cuenta han sido modificados correctamente"; // Este es el titulo del email.
            $body = "Se han modificado sus datos correctamente";
            //$body .= "/n Acá continuo el <strong>mensaje</strong>";
            $mail->Body = $body; // Mensaje a enviar
            //$mail->AltBody = "Hola mundo. Esta es la primer línean. Acá continuo el mensaje";//Texto sin html
            $mail->AddAttachment($vartemp, $varname);
            $exito = $mail->Send(); // Envía el correo.

            if($exito){
            echo "El correo fue enviado correctamente.";
            ?>
            <script type="text/javascript">
                // alert("Registro exitoso, por favor espere validacion de un administrador!");
            </script>
            <?php

            }else{
            echo "Hubo un inconveniente. Email no fue enviado.";
            ?>
            <script type="text/javascript">
              // alert("Hubo un inconveniente con su registro, por favor contacte al administrador!");
            </script>
            <?php
            }
}
?>
