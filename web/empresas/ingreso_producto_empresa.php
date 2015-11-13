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


        ?>

        <div id="header">
            <div id="logo">
                <h1>Donde</h1>
                <p>Comprarlo</p>
            </div>
            <div id="menu">
                <ul>
                        <li><a href="cuenta_empresa.php?rut_empresa=<?php echo $rut_empresa; ?>">Inicio</a></li>
                        <li class ="current_page_item"><a href="ingreso_producto_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Agregar Productos</a></li>
                        <li><a href="administrar_producto_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Administrar Productos</a></li>
                        <li><a href="modificar_cuenta_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Modificar Cuenta</a></li>
                        <li><a href="../../index.php">Cerrar Sesión</a></li>
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
                        <h2><p align="center">Nuevo Producto para empresa <?php echo $nombre_empresa; ?></p></h2>
                        <form enctype="multipart/form-data" action="ingresoProductoEmpresa.php" method="post" name="ingreso" >
                            <table align="center">
                             <input type="hidden" name ="id_empresa" value="<?php echo $id_empresa ?>"/>  
                            <p align="center">Ingrese nombre nuevo producto  </p>                
                            <p align="center">Nombre: <input type="text" name="nombre"  /></p>
                            <p align="center">Descripción: <input type="text" name="descripcion"  /></p>
                            <p align="left" style="margin-left:120px;">Precio: <input type="text" name="precio" placeholder="Ej: 12345"  /></p>
                            <p align="left" style="margin-left:120px;">Seleccione Marca:<select name="id_marca">
                         <?php
                        //Hacemos un ciclo en donde imprimimos cada registro de la tabla
                                    
                        while ($row = mysqli_fetch_array($result4)) {
                            ?>
                              <option value="<?php echo $row['id_marca']; ?>"><?php echo $row['nombre_marca'];?></option> 
                            <?php
                        } //Fin del Ciclo

                        ?>    
                        </select></p>
                        <p align="left" style="margin-left:120px;">Seleccione Sub-Categoria:<select name="id_sub_categoria">
                         <?php
                        //Hacemos un ciclo en donde imprimimos cada registro de la tabla
                                    
                        while ($row = mysqli_fetch_array($result5)) {
                            ?>
                              <option value="<?php echo $row['id_sub_categoria']; ?>"><?php echo $row['nombre_sub_categoria'];?></option> 
                            <?php
                        } //Fin del Ciclo

                        ?>    
                        </select></p>

                        <input multiple align="left" style ="margin-left:120px;" name="upload[]" id="upload" type="file" accept ="images/jpeg"/>
                        <p alig ="left" style="margin-left:130px;">No puede seleccionar más de 6 imagenes.</p>
                            <p align="left"style="margin-left:180px;"><input type="submit" value="Ingresar Producto" /></p>
                            </table>                            
                        </form>


                        <br></br>

                    </div>

                </div>
                </div>

         </body>
 </html>
