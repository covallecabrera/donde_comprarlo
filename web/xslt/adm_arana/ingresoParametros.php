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

        $id_tienda = $_POST['idtienda'];
        $result2 = mysqli_query($con, "Select * from parametros_tienda where tienda_id_tienda=" . $id_tienda . " ");
            while ($row2 = mysqli_fetch_array($result2)) {
                
                $tag_url = $row2['tag_url'];
                $tag_nombre = $row2['tag_nombre'];
                $tag_precio = $row2['tag_precio'];
                $tag_descripcion = $row2['tag_descripcion'];
                $tag_imagen = $row2['tag_imagen'];
                $tag_marca = $row2['tag_marca'];
            }     
        
        $consulta_nombre = ("Select * from tienda where id_tienda = '" . $id_tienda . "' ");
            
            $result = mysqli_query($con,$consulta_nombre);

            while ($row = mysqli_fetch_array($result)) {
                
                $nombre_empresa = $row['nombre_tienda'];
                $id_empresa = $row['id_tienda'];
                
            }


        ?>

        <div id="header">
            <div id="logo">
                <h1>Donde</h1>
                <p>Comprarlo</p>
            </div>
            <div id="menu">
                <ul>
            <li><a href="../../index.php">Inicio</a></li>
            <li><a href="url.php">Ingresar URL</a></li>
            <li><a href="Productos.php">Productos</a></li>
            <li class="current_page_item"><a href="categoriaMarca.php">Administrar Rastreador</a></li>
            <li><a href="../adm_empresas/empresas.php">Empresas</a></li>
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
                    <div class="entry"> <img src="../images/nuevo_producto.gif" alt="" width="150" height="150" class="right" />
                        <h2><p align="center">Nueva Parametrización para tienda <?php echo $nombre_empresa; ?></p></h2>
                        <form enctype="multipart/form-data" action="guardarParametros.php" method="post" name="ingreso" >
                            <table align="center">
                             <input type="hidden" name ="id_tienda" value="<?php echo $id_tienda ?>"/>  
                            <p align="left" style="margin-left:120px;">Ingrese o Modifique Parametros de tienda  </p>            
                            <p align="left" style="margin-left:120px;">Tag Url Producto (en lista): <input type="text" name="url_producto" value="<?php echo $tag_url ?>"  /></p>
                            <p align="left" style="margin-left:120px;">Tag Nombre Producto: <input type="text" name="nombre_producto" value="<?php echo $tag_nombre ?>" /></p>
                            <p align="left" style="margin-left:120px;">Tag Precio Producto: <input type="text" name="precio_producto" value="<?php echo $tag_precio ?>" /></p>
                            <p align="left" style="margin-left:120px;">Tag Descripción Producto: <input type="text" name="descripcion_producto" value="<?php echo $tag_descripcion ?>" /></p>
                            <p align="left" style="margin-left:120px;">Tag Marca Producto: <input type="text" name="marca_producto" value="<?php echo $tag_marca ?>" /></p>
                            <p align="left" style="margin-left:120px;">Tag Imagenes Producto: <input type="text" name="imagen_producto" value="<?php echo $tag_imagen ?>" /></p>
                            <p align="left" style="margin-left:120px;">Por favor Ingrese los tag's en el siguiente formato:  </p>
                            <p align="left" style="margin-left:120px;">Si Tag Precio esta en "div id='precio'""  </p>
                            <p align="left" style="margin-left:120px;">Ingrese Tag de la siguiente manera: "div[id=precio]"  </p>
                            <p align="left"style="margin-left:180px;"><input type="submit" value="Guardar Cambios" /></p>
                            </table>                            
                        </form>


                        <br></br>

                    </div>

                </div>
                </div>

         </body>
 </html>
