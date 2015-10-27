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
<script type="text/javascript">
                // window.history.back();
                function refrescar(){
                    window.location.replace(document.referrer);
                }
                
            </script>

        <?php
        require_once ('../db_conexion.php');

        $result = mysqli_query($con, "Select * from automatizacion_arana"); //Realizamos la seccion de todos los registros de la tabla de las imagenes.
        
        ?>

        <div id="header">
            <div id="logo">
                <h1>Donde</h1>
                <p>Comprarlo</p>
            </div>
            <div id="menu">
                <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="../url.php">Ingresar URL</a></li>
            <li><a href="../Productos.php">Productos</a></li>
            <li class="current_page_item"><a href="../categoriaMarca.php">Administrar Rastreador</a></li>
            <li><a href="../empresas.php">Empresas</a></li>

                </ul>
            </div>
        </div>
        <!-- end header -->
        <!-- start page -->
        <div id="page">
            <!-- start content -->
            <div id="no-content">
                <div class="post greenbox">
                    <div class="title">
                        <h1>Configuración Rastreador Automático</h1>
                    </div>
                    <table align="center" width="500px" border="1" style="border-collapse:collapse;">
                        <tr>
                            <th>Nombre Sitio</th>
                            <th>URL Sitio</th>
                            <th>Estado Automatización</th>
                            <th>Horario Ejecución</th>
                            <th>Fecha Término</th>
                            <th>Tipo</th>
                            <th>Eliminar</th>
                            <th>Detener</th>
                            <th>Ejecutar</th>
                        </tr>

                        <?php
                        //Hacemos un ciclo en donde imprimimos cada registro de la tabla
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>			
                                <td><?php echo $row['nombre_sitio']; ?></td>
                                <td><?php echo $row['url_rastreo'];  ?></td>
                                <td><?php echo $row['estado']; ?></td>
                                <td><?php echo $row['horario'];  ?></td>
                                <td><?php 
                                    if($row['fecha_termino']==""){
                                        echo "Indefinido";
                                    }else{
                                echo $row['fecha_termino'];  }?></td>
                                <td><?php echo $row['tipo'];?> </td>
                                <td><a href="administrarEjecucionArana.php?accion=eliminar&id=<?php echo $row['id_automatizacion_arana'] ?>">Eliminar</a></td> 
                                <td><a href="administrarEjecucionArana.php?accion=detener&id=<?php echo $row['id_automatizacion_arana'] ?>">Detener</a></td> 
                                <td><a href="../redireccionArana.php?url=<?php echo $row['url_rastreo'] ?>">Ejecutar</a></td> 
                            </tr>
                            <?php
                        } //Fin del Ciclo
                       
                        ?>
                    </table>

                        <form method="get" action="nueva_automatizacion.php">
                                        
                         <input type="submit" value="Agregar Nuevo Link y configuración" name="nueva url" />
                                        
                        </form>
                </div>
                <br></br>
                <br></br>






                </body>
                </html>
