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
        $result1 = mysqli_query($con, "Select * from categoria");
        $result2 = mysqli_query($con, "Select * from categoria");
        $result3 = mysqli_query($con, "Select * from marca");
        $result4 = mysqli_query($con, "Select * from marca");
        $result5 = mysqli_query($con, "Select * from sub_categoria");
        $result6 = mysqli_query($con, "Select * from tienda");
        $result7 = mysqli_query($con, "Select * from tienda where estado_tienda = 'auto'");
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
            <!-- start content -->
             <br>
            <div id="content">
                <div class="post greenbox">
                    <div class="title">
                        <h1>Administrar Ejecución Automática</h1>
                    </div>
                    <div class="entry"> <img src="../images/url1.jpg" alt="" width="150" height="150" class="right" />
                        <h2><p align="center">Haga click para ver configuración de automatización</p></h2>
                            <table align="center">
                            <p align="center"><a  href="../administrador/automatizacion_arana.php" >Configuración Araña </a></p>
                            
                            </table>                            
                        </form>


                        <br></br>

                    </div>

                </div>
                </div>

        <div id="page">
            <!-- start content -->
             <br>
            <div id="content">
                <div class="post greenbox">
                    <div class="title">
                        <h1>Administrar Parametros Araña</h1>
                    </div>
                    <div class="entry"> <img src="../images/url1.jpg" alt="" width="150" height="150" class="right" />
                        <h2><p align="center">Haga click para ver configuración de parametros</p></h2>
                        <form enctype="multipart/form-data" action="ingresoParametros.php" method="post" name="categoria" target="_self">
                            <table align="center">
                            <p align="center">Tienda asociada:<select name="idtienda">
                                    <?php
                        //Hacemos un ciclo en donde imprimimos cada registro de la tabla
                                    
                        while ($row = mysqli_fetch_array($result7)) {
                            ?>
                                 <option value="<?php echo $row['id_tienda']; ?>"><?php echo $row['nombre_tienda'];?></option> 
                            <?php
                        } //Fin del Ciclo

                        ?>         
                    </select></p>      
                            <p align="left" style="margin-left:180px;"><input type="submit" value="Ver paramatrización" /></p>
                      
                            </table>                            
                        </form>


                        <br></br>

                    </div>

                </div>
                </div>


            <div id="content">
                <div class="post greenbox">
                    <div class="title">
                        <h1>Nuevo Sitio / Script</h1>
                    </div>
                    <div class="entry"> <img src="../images/url1.jpg" alt="" width="150" height="150" class="right" />
                        <h2><p align="center">Nuevo Sitio</p></h2>
                        <form enctype="multipart/form-data" action="ingresarSitio.php" method="post" name="categoria" target="_self">
                            <table align="center">
                            <p align="center">Agregue un Script para nuevo sitio </p>
                            <a align="center" href="../arana/ejemplo_arana.txt" target="_blank"><p>Ver Ejemplo Scrip</p></a>
                            <p align="center">Nombre Sitio: <input type="text" name="sitio"  /></p>
                            <input align="left" style ="margin-left:120px;" name="script" type="file" />
                    </select></p>
                            <p align="left" style="margin-left:180px;"><input type="submit" value="Ingresar" /></p>
                            
                            </table>                            
                        </form>


                        <br></br>

                    </div>

                </div>
                </div>
            


            <br>
            <div id="content">
                <div class="post greenbox">
                    <div class="title">
                        <h1>Categoria</h1>
                    </div>
                    <div class="entry"> <img src="../images/categoria.png" alt="" width="150" height="150" class="right" />
                        <h2><p align="center">Nueva Categoria</p></h2>
                        <form enctype="multipart/form-data" action="ingresoCategoria.php" method="post" name="categoria" target="_self">
                            <table align="center">
                            <p align="center">Ingrese una nueva categoría para ser rastreada  </p>
                            <p align="center">Categoria: <input type="text" name="categoria"  /></p>
                            
                    </select></p>
                            <p align="center"><input type="submit" value="Ingresar" /></p>
                            <p align="left"style="margin-left:120px;">Categorias Actuales:<select name="idcategoria"></p>
                         <?php
                        //Hacemos un ciclo en donde imprimimos cada registro de la tabla
                                    
                        while ($row = mysqli_fetch_array($result1)) {
                            ?>
                              <option value="<?php echo $row['id_categoria']; ?>"><?php echo $row['nombre_categoria'];?></option> 
                            <?php
                        } //Fin del Ciclo

                        ?>   
                            </table>                            
                        </form>


                        <br></br>

                    </div>

                </div>
                </div>
            
            <br></br>
            <!-- start content -->
        
            <div id="content">
                <br>
                <div class="post greenbox">
                    <div class="title">
                        <h1>Sub-Categoria</h1>
                    </div>
                    <div class="entry"> <img src="../images/subcategoria.png" alt="" width="150" height="150" class="right" />
                        <h2><p align="center">Nueva Sub-Categoria</p></h2>
                        <form enctype="multipart/form-data" action="ingresoSubCategoria.php" method="post" name="subcategoria" target="_self">
                            <table align="center">
                                <p align="center">Seleccione una categoria para ingresar una nueva Sub-Categoria  </p>
                                <p align="center">Categoria asociada:<select name="idcategoria">
                                    <?php
                        //Hacemos un ciclo en donde imprimimos cada registro de la tabla
                                    
                        while ($row = mysqli_fetch_array($result2)) {
                            ?>
                                        <option value="<?php echo $row['id_categoria']; ?>"><?php echo $row['nombre_categoria'];?></option> 
                            <?php
                        } //Fin del Ciclo

                        ?>         
                    </select></p>
                            <p align="left"style="margin-left:120px;">Sub-Categoria: <input type="text" name="subcategoria"  /></p>
                            <p align="left"style="margin-left:180px;"><input type="submit" value="Ingresar" /></p>
                             </select></p>
                        <p align="left"style="margin-left:120px;">Sub-Categorias Existentes:<select name="as">
                         <?php
                        //Hacemos un ciclo en donde imprimimos cada registro de la tabla
                                    
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                              <option value="<?php echo $row['id_sub_categoria']; ?>"><?php echo $row['nombre_sub_categoria'];?></option> 
                            <?php
                        } //Fin del Ciclo

                        ?>    
                                </select></p>
                            </table>                            
                        </form>


                        <br></br>

                    </div>

                </div>
                </div>
            <br></br>
          <!-- start content -->
            <div id="content">
                <br>
                <div class="post greenbox">
                    <div class="title">
                        <h1>Marca</h1>
                    </div>
                    <div class="entry"> <img src="../images/marcas.jpeg" alt="" width="150" height="150" class="right" />
                        <h2><p align="center">Nueva Marca</p></h2>
                        <form enctype="multipart/form-data" action="ingresoMarca.php" method="post" name="ingreso" target="_self">
                            <table align="center">
                            <p align="center">Ingrese una nueva marca para ser rastreada  </p>                
                            <p align="center">Marca: <input type="text" name="marca"  /></p>
                            
                    </select></p>
                            <p align="left"style="margin-left:180px;"><input type="submit" value="Ingresar" /></p>
                            <p align="left"style="margin-left:120px;">Marcas Actuales:<select name="idcategoria">
                         <?php
                        //Hacemos un ciclo en donde imprimimos cada registro de la tabla
                                    
                        while ($row = mysqli_fetch_array($result3)) {
                            ?>
                              <option value="<?php echo $row['id_marca']; ?>"><?php echo $row['nombre_marca'];?></option> 
                            <?php
                        } //Fin del Ciclo

                        ?>     
                            </table>                            
                        </form>


                        <br></br>

                    </div>

                </div>
                </div>
            <div id="content">
                <br>
                <div class="post greenbox">
                    <div class="title">
                        <h1>Producto</h1>
                    </div>
                    <div class="entry"> <img src="../images/nuevo_producto.gif" alt="" width="150" height="150" class="right" />
                        <h2><p align="center">Nuevo Producto</p></h2>
                        <form enctype="multipart/form-data" action="ingresoProducto.php" method="post" name="ingreso" target="_self">
                            <table align="center">
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
                        <p align="left" style="margin-left:120px;">Seleccione Tienda Asociada:<select name="id_tienda">
                         <?php
                        //Hacemos un ciclo en donde imprimimos cada registro de la tabla
                                    
                        while ($row = mysqli_fetch_array($result6)) {
                            ?>
                              <option value="<?php echo $row['id_tienda']; ?>"><?php echo $row['nombre_tienda'];?></option> 
                            <?php
                        } //Fin del Ciclo

                        ?>    
                        </select></p>
                        <input multiple align="left" style ="margin-left:120px;" name="upload[]" id="upload" type="file" />
                        <p alig ="left" style="margin-left:130px;">No puede seleccionar más de 6 imagenes.</p>
                            <p align="left"style="margin-left:180px;"><input type="submit" value="Ingresar" /></p>
                            </table>                            
                        </form>


                        <br></br>

                    </div>

                </div>
                </div>
                </body>
                </html>
