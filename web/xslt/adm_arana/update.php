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

                <div id="header">
            <div id="logo">
                <h1>Donde</h1>
                <p>Comprarlo</p>
            </div>
            <div id="menu">
                <ul>
            <li><a href="../../index.php">Inicio</a></li>
            <li><a href="url.php">Ingresar URL</a></li>
            <li class="current_page_item"><a href="Productos.php">Productos</a></li>
            <li><a href="categoriaMarca.php">Agregar categoria o marca</a></li>
            <li><a href="../adm_empresas/empresas.php">Empresas</a></li>
                </ul>
            </div>
        </div>
        <?php
        require_once ('../db_conexion.php');
        $produId = htmlspecialchars($_POST['productoId']);
        $nombre = htmlspecialchars($_POST['productoNombre']);
        $descricion = htmlspecialchars($_POST['productoDescripcion']);
        $precio = htmlspecialchars($_POST['productoPrecio']);
        $result = mysqli_query($con, "Select * from productos"); //Realizamos la seccion de todos los registros de la tabla de las imagenes.
        ?>

         <div id="page">
 
            <div id="content">
                <br>
                <div class="post greenbox">
                    <div class="title">
                        <h1>Actualizar Producto: <?php echo $nombre ?></h1>
                    </div>
        <form enctype="multipart/form-data" action="updateDatos.php" method="post" name="agregar" target="_self">
            <table align="center">
                <p align="center"><input type="hidden" name="idUpdate" value="<?php echo $produId; ?>"  /></p>
                <p align="center">NOMBRE:<input type="text" name="nombreUpdate" value="<?php echo $nombre; ?>"  /></p>
                <p align="center">DESCRIPCION:<textarea rows="10" col="20"name="descripcionUpdate">  <?php echo $descricion; ?>  </textarea></p>
                <p align="center">PRECIO:<input type="text" name="precioUpdate" value="<?php echo $precio; ?>" /></p>
                <p align="center"><input type="submit" onclick="volver()"value="Guardar Cambios" /></p>
            </table>                            
        </form>
    </div>
</div>
</div>
<script type="text/javascript">
function volver(){
    window.location.replace(document.referrer);
}
</script>
    </body>
</html>
