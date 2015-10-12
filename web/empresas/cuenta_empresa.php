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
            <title>Cuenta Empresa - Donde Comprarlo</title>
            <meta name="keywords" content="" />
            <meta name="description" content="" />
            <link href="../default.css" rel="stylesheet" type="text/css" media="screen" />
        </head>
        <body>
            <!-- start header -->
             <?php  
             require('../db_conexion.php');
             require('validaciones_empresas.php');

             if(isset($_GET['rut_empresa'])){
                $rut_empresa = $_GET['rut_empresa'];
             }else{
             $rut_empresa = $_POST['rut'];
             $contrasena_empresa = $_POST['contrasena'];


            //$rut_empresa = formato_rut($rut_empresa1);

             valida_campos_vacios_ingreso($rut_empresa,$contrasena_empresa);
             valida_rut($rut_empresa);
             valida_rut_existente($rut_empresa,$con);
             valida_contrasena_empresa($rut_empresa,$contrasena_empresa,$con);
             }

             $consulta_nombre = ("Select nombre_tienda from tienda where rut_tienda = '" . $rut_empresa . "' ");
            
            $result = mysqli_query($con,$consulta_nombre);

            while ($row = mysqli_fetch_array($result)) {
                
                $nombre_empresa = $row['nombre_tienda'];
                
            }

             ?>

            <div id="header">
                <div id="logo">
                    <h1>Donde</h1>
                    <p>Comprarlo</p>
                </div>
                <div id="menu">
                    <ul>
                        <li class="current_page_item"><a href="cuenta_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Inicio</a></li>
                        <li><a href="ingreso_producto_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Agregar Productos</a></li>
                        <li><a href="administrar_producto_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Administrar Productos</a></li>
                        <li><a href="modificar_cuenta_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Modificar Cuenta</a></li>
                        <li><a href="../index.php">Cerrar Sesión</a></li>

                    </ul>
                </div>
            </div>
            <!-- end header -->
            <!-- start page -->
            <div id="page">
        <!-- start content -->
        <div id="content" style="margin-left:170px;">
            <div class="post greenbox">
                <div class="title">
                    <h1>Sitio de Empresa de Donde Comprarlo</h1>
                </div>
                <div class="entry"> <img src="../images/img17.jpg" alt="" width="120" height="120" class="left" />
                    <p> Bienvenida empresa <strong><?php echo $nombre_empresa ?></strong>  a su cuenta de Donde Comprarlo. Acá usted podrá agregar agregar nuevos productos, 
                        eliminar productos o modificarlos, además podrá modificar datos de su cuenta.</p>
                </div>
                <div class="btm">
                    <div class="l">
                        <div class="r">
                            <p class="meta"><a href="#" class="more">Read More</a> &nbsp;&nbsp;&nbsp; <a href="#" class="comments">Comments (33)</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="two-columns">
                <div class="columnA">
                    <div class="title red">
                        <h2>Links Cortos</h2>
                    </div>
                    <div class="content">
                        <ul>
                        <li><a href="ingreso_producto_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Agregar Productos</a></li>
                        <li><a href="administrar_producto_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Administrar Productos</a></li>
                        <li><a href="modificar_cuenta_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Modificar Cuenta</a></li>
                        <li><a href="../index.php">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </div>
                <div class="columnB">
                    <div class="title blue">
                        <h2>Gravida Orci</h2>
                    </div>
                    <div class="content">
                        <ul>
                            <li><a href="#">Aliquam libero</a></li>
                            <li><a href="#">Consectetuer adipiscing elit</a></li>
                            <li><a href="#">metus aliquam pellentesque</a></li>
                            <li><a href="#">Suspendisse iaculis mauris</a></li>
                            <li><a href="#">Urnanet non molestie semper</a></li>
                            <li><a href="#">Proin gravida orci porttitor</a></li>
                        </ul>
                    </div>
                </div>
                <div class="btm">&nbsp;</div>
            </div>
        </div>
                    </body>
                    </html>
