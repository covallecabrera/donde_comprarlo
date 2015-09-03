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
        <script> 
        function abrir(){
            open('Popup.php', '', 'top=300,left=300,width=200,height=50');
        } 
        
        
        </script>
      
    </head>
    <body>
        <!-- start header -->
         <?php
        require_once('db_conexion.php'); //importamos el archivo de conexión 
        $result = mysqli_query($con, "Select * from sub_categoria"); //Realizamos la seccion de todos los registros de la tabla de las imagenes.
        $result1 = mysqli_query($con, "Select * from categoria");
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
            <li><a href="Productos.php">Productos</a></li>
            <li><a href="correo_confirmacion.php">Registro empresa</a></li>
            <li class="current_page_item"><a href="categoriaMarca.php">Agregar categoria o marca</a></li>
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
                        <h1>Ingresar nueva categoria</h1>
                    </div>
                    <div class="entry"> <img src="images/url1.jpg" alt="" width="150" height="150" class="right" />
                        <h2><p align="center">Ingrese nueva Categoria</p></h2>
                        <form enctype="multipart/form-data" action="ingresoCategoria.php" method="post" name="categoria" target="_blank">
                            <table align="center">
                            <p align="center">Categoria: <input type="text" name="categoria"  /></p>
                            <p align="center"><input type="submit" value="Ingresar" /></p>
                            </table>                            
                        </form>


                        <br></br>

                    </div>

                </div>
                </div>
            
            <br></br>
            <!-- start content -->
            <div id="content">
                <div class="post greenbox">
                    <div class="title">
                        <h1>Ingresar nueva sub-categoria</h1>
                    </div>
                    <div class="entry"> <img src="images/url1.jpg" alt="" width="150" height="150" class="right" />
                        <h2><p align="center">Ingrese nueva Sub-Categoria</p></h2>
                        <form enctype="multipart/form-data" action="ingresoSubCategoria.php" method="post" name="subcategoria" target="_blank">
                            <table align="center">
                                <p align="center">Categoria asociada:<select name="idcategoria">
                                    <?php
                        //Hacemos un ciclo en donde imprimimos cada registro de la tabla
                                    
                        while ($row = mysqli_fetch_array($result1)) {
                            ?>
                                        <option value="<?php echo $row['id_categoria']; ?>"><?php echo $row['nombre_categoria'];?></option> 
                            <?php
                        } //Fin del Ciclo
                        mysqli_close($con); //cerramos la conexión
                        ?>         
                                </select></p>
                            <p align="center">Sub-Categoria: <input type="text" name="subcategoria"  /></p>
                            <p align="center"><input type="submit" value="Ingresar" /></p>
                            </table>                            
                        </form>


                        <br></br>

                    </div>

                </div>
                </div>
            <br></br>
            <!-- start content -->
            <div id="content">
                <div class="post greenbox">
                    <div class="title">
                        <h1>Ingresar nueva marca</h1>
                    </div>
                    <div class="entry"> <img src="images/url1.jpg" alt="" width="150" height="150" class="right" />
                        <h2><p align="center">Ingrese nueva Marca</p></h2>
                        <form enctype="multipart/form-data" action="ingresoMarca.php" method="post" name="ingreso" target="_blank">
                            <table align="center">
                                                                
                            <p align="center">Marca: <input type="text" name="marca"  /></p>
                            <p align="center"><input type="submit" value="Ingresar" /></p>
                            </table>                            
                        </form>


                        <br></br>

                    </div>

                </div>
                </div>
                </body>
                </html>
