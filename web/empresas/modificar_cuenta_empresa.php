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
                        <form enctype="multipart/form-data" action="ModificarCuentaEmpresa.php" method="post" name="ingreso" target="_self">
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

