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
        $result4 = mysqli_query($con, "Select * from marca");
        $result5 = mysqli_query($con, "Select * from sub_categoria");
        $rut_empresa = $_GET['rut_empresa'];

        $consulta_nombre = ("Select * from tienda where rut_tienda = '" . $rut_empresa . "' ");
            
            $result = mysqli_query($con,$consulta_nombre);

            while ($row = mysqli_fetch_array($result)) {
                
                $nombre_empresa = $row['nombre_tienda'];
                $id_empresa = $row['id_tienda'];
                
            }
            $consulta_productos_tienda = ("select * FROM productos INNER JOIN 
            tienda_has_productos on tienda_has_productos.productos_id_productos = productos.id_productos 
            INNER JOIN tienda ON tienda.id_tienda = tienda_has_productos.tienda_id_tienda where tienda.rut_tienda = '".$rut_empresa."'");
           // echo $consulta_productos_tienda;
           $consulta_productos = mysqli_query($con,$consulta_productos_tienda);
            // $rowa = mysqli_fetch_array($consulta_productos);
            // echo $rowa['id_productos'];
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
                        <li class ="current_page_item"><a href="administrar_producto_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Administrar Productos</a></li>
                        <li><a href="modificar_cuenta_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Modificar Cuenta</a></li>
                        <li><a href="../index.php">Cerrar Sesión</a></li>
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
                        <h1>Productos para empresa <?php echo $nombre_empresa ?> </h1>
                    </div>
                    <table align="center" width="500px" border="1" style="border-collapse:collapse;">
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Descripcion</th>
                            <th>Marca</th>
                            <th>Categoria</th>
                            <th>Eliminar</th>
                            <th>Actualizar</th>
                        </tr>

                        <?php
                        //Hacemos un ciclo en donde imprimimos cada registro de la tabla
                        while ($row = mysqli_fetch_array($consulta_productos)) {
                            ?>
                            <tr>    

                                <td><?php  echo $row['nombre_producto'] ?></td> 
                                <td><?php  echo $row['precio_producto'] ?></td>
                                <td><?php  echo $row['descripcion_producto'] ?></td>
                                <td><?php  
                                    $consulta_marca = mysqli_query($con,"select * from marca where id_marca = '".$row['marca_id_marca']."'"); 
                                    $marca = mysqli_fetch_array($consulta_marca);
                                    echo $nombre_marca = $marca['nombre_marca'];
                                    
                                ?></td>
                                <td><?php  
                                    $consulta_sub_categoria = mysqli_query($con,"select * from sub_categoria where id_sub_categoria = '".$row['sub_categoria_id_sub_categoria']."'");
                                    $sub_categoria = mysqli_fetch_array($consulta_sub_categoria);
                                    echo $nombre_sub_categoria = $sub_categoria['nombre_sub_categoria'];
                                ?></td>
                                <td><a href="AdministrarProductosEmpresa.php?id=<?php echo $row['id_productos'].'&'."accion=eliminar" ?>">Eliminar Producto</a></td> 
                                <td><a href="AdministrarProductosEmpresa.php?id=<?php echo $row['id_productos'].'&'."accion=actualizar".'&'."rut_empresa=$rut_empresa"?>">Actualizar Producto</a></td>                             
                            </tr>
                            <?php
                        } //Fin del Ciclo
                        //mysqli_close($con2); //cerramos la conexión
                        //mysqli_close($con); //cerramos la conexión
                        ?>
                    </table>

                </div>
                <br></br>
                <br></br>

         </body>
 </html>
