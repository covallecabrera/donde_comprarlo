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
<script type="text/javascript">
                // window.history.back();
                function refrescar(){
                    window.location.replace(document.referrer);
                }
                
            </script>

        <?php
        require_once ('db_conexion.php');

        $result = mysqli_query($con, "Select * from productos where estado_producto = 0"); //Realizamos la seccion de todos los registros de la tabla de las imagenes.
        

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
            <li><a href="categoriaMarca.php">Administrar Rastreador</a></li>
            <li><a href="empresas.php">Empresas</a></li>

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
                        <h1>Productos en espera de ser ingresados</h1>
                    </div>
                    <table align="center" width="500px" border="1" style="border-collapse:collapse;">
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Descripcion</th>
                            <th>Marca</th>
                            <th>Sub Categoria</th>
                            <th>Categoria</th>
                            <th>Eliminar</th>
                            <th>Ingresar</th>
                            <th>Actualizar</th>
                        </tr>

                        <?php
                        //Hacemos un ciclo en donde imprimimos cada registro de la tabla
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>			
                                <td><?php echo $row['nombre_producto']; ?></td>
                                <td><?php
                                    $result2 = mysqli_query($con, "Select * from tienda_has_productos where productos_id_productos='" . $row['id_productos'] . "'");
                                    while ($row2 = mysqli_fetch_array($result2)) {
                                        $precioDato=$row2['precio_producto'];
                                        echo $row2['precio_producto'];
                                    }
                                    ?></td>
                                <td><?php echo $row['descripcion_producto'] ?></td>
                                <td><?php

                                $sqlMarca = mysqli_query($con, "Select * from marca where id_marca = ".$row["marca_id_marca"]);
                                
                                while ($puntero = mysqli_fetch_array($sqlMarca)) {

                                    echo $puntero["nombre_marca"];
                                } 
                                
                                    

                                    ?></td>
                                <td><?php

                                $sqlSubCategoria = mysqli_query($con, "Select * from sub_categoria where id_sub_categoria = ".$row["sub_categoria_id_sub_categoria"]);
                                
                                while ($puntero = mysqli_fetch_array($sqlSubCategoria)) {

                                    echo $puntero["nombre_sub_categoria"];
                                } 

                                    ?></td>
                                 <td><?php

                                $sqlSubCategoria = mysqli_query($con, "Select * from sub_categoria where id_sub_categoria = ".$row["sub_categoria_id_sub_categoria"]);
                                
                                    while ($puntero = mysqli_fetch_array($sqlSubCategoria)) {

                                        $sqlCategoria = mysqli_query($con, "Select * from categoria where id_categoria = ".$puntero["categoria_id_categoria"]);

                                        
                                        while ($puntero1 = mysqli_fetch_array($sqlCategoria)) {

                                            echo $puntero1["nombre_categoria"];
                                        } 
                                }
                                    ?></td>
                                <td><form enctype="multipart/form-data" action="borrarDatos.php" method="post" name="borrar" target="_self">
                                        <table align="center">
                                            <p><input type="hidden" name="Eliminar" value="<?php echo $row['id_productos']; ?>" style="visibility:hidden " size="4" /></p>
                                            <p align="center"><input type="submit" value="Eliminar"/></p>
                                        </table>                            
                                    </form></td>
                                <td><form enctype="multipart/form-data" action="agregarDatos.php" method="post" name="agregar" target="_self">
                                        <table align="center">
                                            <p><input type="hidden" name="productoId" value="<?php echo $row['id_productos']; ?>" style="visibility:hidden "  /></p>
                                            <p><input type="hidden" name="productoNombre" value="<?php echo $row['nombre_producto']; ?>" style="visibility:hidden "  /></p>
                                            <p><input type="hidden" name="productoDescripcion" value="<?php echo $row['descripcion_producto']; ?>" style="visibility:hidden "  /></p>
                                            <p><input type="hidden" name="productoPrecio" value="<?php echo $precioDato; ?>" style="visibility:hidden "  /></p>
                                            <p><input type="hidden" name="productoMarca" value="<?php echo $row['marca_id_marca']; ?>" style="visibility:hidden "  /></p>
                                            <p><input type="hidden" name="productoCategoria" value="<?php echo $row['sub_categoria_id_sub_categoria']; ?>" style="visibility:hidden "  /></p>
                                            <p align="center"><input type="submit" value="Agregar" /></p>
                                        </table>                            
                                    </form></td>
                                <td><form enctype="multipart/form-data" action="update.php" method="post" name="agregar" target="_blank">
                                        <table align="center">
                                            <p><input type="hidden" name="productoId" value="<?php echo $row['id_productos']; ?>" style="visibility:hidden "  /></p>
                                            <p><input type="hidden" name="productoNombre" value="<?php echo $row['nombre_producto']; ?>" style="visibility:hidden "  /></p>
                                            <p><input type="hidden" name="productoDescripcion" value="<?php echo $row['descripcion_producto']; ?>" style="visibility:hidden "  /></p>
                                            <p><input type="hidden" name="productoPrecio" value="<?php echo $precioDato; ?>" style="visibility:hidden "  /></p>
                                            <p align="center"><input type="submit" value="Actualizar" /></p>
                                        </table>                            
                                    </form></td>
                            </tr>
                            <?php
                        } //Fin del Ciclo
                       
                        ?>
                    </table>

                </div>
                <br></br>
                <br></br>






                </body>
                </html>
