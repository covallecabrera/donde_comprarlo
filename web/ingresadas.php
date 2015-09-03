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
        <link href="default.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <body>
        <!-- start header -->

        <?php
        require_once('db_conexion.php'); //importamos el archivo de conexión 
        $result = mysqli_query($con, "Select * from url"); //Realizamos la seccion de todos los registros de la tabla de las imagenes.
        ?>

        <div id="header">
            <div id="logo">
                <h1>Donde</h1>
                <p>Comprarlo</p>
            </div>
            <div id="menu">
                <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="url.php">Ingresar URL</a></li>
            <li class="current_page_item"><a href="Productos.php">Productos</a></li>
            <li><a href="correo_confirmacion.php">Registro empresa</a></li>
            <li><a href="categoriaMarca.php">Agregar categoria o marca</a></li>
            <li><a href="empresas.php">Empresas</a></li>
            <li><a href="#">Contacto</a></li>
                </ul>
            </div>
        </div>
        <!-- end header -->
        <!-- start page -->
        <div id="page">
            <!-- start content -->
            <div id="content">
                <div class="post greenbox">
                    <div class="title">
                        <h1>URL Ingresadas</h1>
                    </div>
                    <table align="center" width="500px" border="1" style="border-collapse:collapse;">
                        <tr>
                            <th>Numero URL</th>
                            <th>URL ingresada</th>
                        </tr>

                        <?php
                        //Hacemos un ciclo en donde imprimimos cada registro de la tabla
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>			
                                <td><?php echo $row['id_url'] ?></td>
                                <td><?php echo $row['url'] ?></td>
                            </tr>
                        <?php
                        } //Fin del Ciclo
                        mysqli_close($con); //cerramos la conexión
                        ?>
                    </table>

                </div>
                <br></br>
                <br></br>






                </body>
                </html>
