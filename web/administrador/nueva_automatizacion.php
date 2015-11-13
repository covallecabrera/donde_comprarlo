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
        $result = mysqli_query($con, "Select * from sub_categoria"); //Realizamos la seccion de todos los registros de la tabla de las imagenes.
        $result2 = mysqli_query($con, "Select * from tienda where estado_tienda = 'auto'");
        ?>

        <div id="header">
            <div id="logo">
                <h1>Donde</h1>
                <p>Comprarlo</p>
            </div>
            <div id="menu">
                <ul>
            <li><a href="../../index.php">Inicio</a></li>
            <li><a href="../adm_arana/url.php">Ingresar URL</a></li>
            <li><a href="../adm_arana/Productos.php">Productos</a></li>
            <li class="current_page_item"><a href="../adm_arana/categoriaMarca.php">Administrar Rastreador</a></li>
            <li><a href="../adm_empresas/empresas.php">Empresas</a></li>
                </ul>
            </div>
        </div>
        <!-- end header -->
        <!-- start page -->
        <div id="page">
            <!-- start content -->
             <br>
            
            <div id="content">
                <br>
                <div class="post greenbox">
                    <div class="title">
                        <h1>Automatización</h1>
                    </div>
                    <div class="entry"> <img src="../images/nuevo_producto.gif" alt="" width="150" height="150" class="right" />
                        <h2><p align="center">Nuevo Sitio Automático</p></h2>
                        <form enctype="multipart/form-data" action="nuevaAutomatizacion.php" method="post" name="ingreso" target="_self">
                            <table align="center">
                            <p align="center">Sitio: 
                            <select name="nombre_tienda">
                                <?php
                                    while ($row = mysqli_fetch_array($result2)){
                                        ?>
                                            <option value="<?php echo $row['nombre_tienda']; ?>"><?php echo $row['nombre_tienda'];?></option> 
                                        <?php
                                    }

                                 ?>
                            </select>
                            </p>
                            <p align="center">URL a rastrear: <input type="text" name="url"  /></p>
                            <p align="center">Horario: 
                            <select name="hora">
                                        <?php
                                        for ($i=1; $i<=24; $i++) {
                                            if ($i == time('j'))
                                                echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                            else
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                        ?>
                                </select>
                                <select name="minuto">
                                        <?php
                                        for ($i=1; $i<=60; $i++) {
                                            if ($i == time('m'))
                                                echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                            else
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                        ?>
                                </select>


                            </p>
                        <p align="left" style="margin-left:120px;">Seleccione Automatización:

                                <select name="automatizacion">
                                    <OPTION VALUE="diario">Diario</OPTION> 
                                    <OPTION VALUE="semanal">Semanal</OPTION> 
                                    <OPTION VALUE="mensual">Mensual</OPTION> 
                                    <OPTION VALUE="anual">Anual</OPTION> 
                                </select>

                        </p>
                        <p align="left" style="margin-left:120px;"> Evento Único
                            <input type="checkbox" name="unico" value="unico"> Si selecciona evento único debe seleccionar una fecha abajo.<br>
                        </p>
                         <p align="left" style="margin-left:120px;"> Fecha de Término.
                            <input type="checkbox" name="option1" value="termino"> Si selecciona término debe seleccionar una fecha abajo.<br>
                        </p>
                        <p align="left" style="margin-left:120px;"> Si no selecciona evento unico o fecha de termino la araña se ejecutará de manera indefinida</p>
                        <p align="left"style="margin-left:120px;">Fecha: 
                            <select name="dia">
                                    <?php
                                    for ($i=1; $i<=31; $i++) {
                                        if ($i == date('j'))
                                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                        else
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    ?>
                            </select>
                            <select name="mes">
                                    <?php
                                    for ($i=1; $i<=12; $i++) {
                                        if ($i == date('m'))
                                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                        else
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    ?>
                            </select>
                            <select name="ano">
                                    <?php
                                    for($i=date('o'); $i<=2050; $i++){
                                        if ($i == date('o'))
                                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                        else
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    ?>
                            </select>

                        </p>

                            <p align="left"style="margin-left:180px;"><input type="submit" value="Agregar" /></p>
                            </table>                            
                        </form>


                        <br></br>

                    </div>

                </div>
                </div>
                </body>
                </html>
