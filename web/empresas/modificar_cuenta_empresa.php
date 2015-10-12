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
        <link href="../default.css" rel="stylesheet" type="text/css" media="screen" />

    </head>
    <body>
        <!-- start header -->
         <?php
        require_once('../db_conexion.php'); //importamos el archivo de conexión 
        require('../../PHPMailerAutoload.php');
        $result4 = mysqli_query($con, "Select * from marca");
        $result5 = mysqli_query($con, "Select * from sub_categoria");
        $rut_empresa = $_GET['rut_empresa'];

        $consulta_nombre = ("Select * from tienda where rut_tienda = '" . $rut_empresa . "' ");
            
            $result = mysqli_query($con,$consulta_nombre);

            while ($row = mysqli_fetch_array($result)) {
                
                $nombre_empresa = $row['nombre_tienda'];
                $id_empresa = $row['id_tienda'];
                $correo_empresa = $row['correo_tienda'];
                $direccion_empresa = $row['direccion_tienda'];
                $contrasena_empresa = $row['contrasena_tienda'];
            }


        ?>

        <div id="header">
            <div id="logo">
                <h1>Donde</h1>
                <p>Comprarlo</p>
            </div>
            <div id="menu">
                <ul>
                        <li><a href="cuenta_empresa.php?rut_empresa=<?php echo $rut_empresa; ?>">Inicio</a></li>
                        <li><a href="ingreso_producto_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Agregar Productos</a></li>
                        <li><a href="administrar_producto_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Administrar Productos</a></li>
                        <li class ="current_page_item"><a href="modificar_cuenta_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Modificar Cuenta</a></li>
                        <li><a href="../index.php">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
        <!-- end header -->

        <!-- start page -->
        <div id="page">
 
            <div id="content">
                <br>
                <div class="post greenbox">
                    <div class="title">
                        <h1>Producto</h1>
                    </div>
                    <div class="entry"> <img src="../images/marcas.jpeg" alt="" width="150" height="150" class="right" />
                        <h2><p align="center">Actualizar datos para empresa: <?php echo $nombre_empresa; ?></p></h2>
                        <form enctype="multipart/form-data" action="modificar_cuenta_empresa.php" method="post" name="ingreso" target="_self">
                            <table align="center">
                             <input type="hidden" name ="id_empresa" value="<?php echo $id_empresa ?>"/>  
                             <input type="hidden" name ="contrasena_empresa" value="<?php echo $contrasena_empresa ?>"/> 
                            <p align="center">En esta sección usted podra modificar sus datos  </p>                
                            <p align="center">Nombre empresa: <input type="text" name="nombre" value="<?php echo $nombre_empresa ?>"  /></p>
                            <p align="center">Rut: <input type="text" name="rut" value="<?php echo $rut_empresa ?>" readonly /></p>
                            <align="left" style="margin-left:80px;"> Si desea modificar su rut pongase en contacto con el administrador</p>
                            <p align="left" style="margin-left:120px;">Correo: <input type="text" name="correo" value="<?php echo $correo_empresa ?>"  /></p>
                            <p align="left" style="margin-left:120px;">Contraseña: <input type="password" name="contrasena" placeholder="Ingrese nueva contraseña"  /></p>
                            <p align="left" style="margin-left:120px;">Dirección: <input type="text" name="direccion" value="<?php echo $direccion_empresa ?>"  /></p>                           
                            <p align="left"style="margin-left:180px;"><input type="submit" value="Actualizar Datos" /></p>
                            </table>                            
                        </form>


                        <br></br>

                    </div>

                </div>
                </div>

         </body>
 </html>

<?php 
 
    if(isset($_POST['id_empresa'])){
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

    }

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
            $mail->AddCC(); // Copia
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
