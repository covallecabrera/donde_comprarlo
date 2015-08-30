<html>
    <head>
        <meta charset="UTF-8">
        <title>ACTUALIZACION DE DATOS</title>
    </head>
    <body>
        <?php
        require_once ('db_conexion.php');
        require_once('db_conexion2.php');
        $produId = htmlspecialchars($_POST['productoId']);
        $nombre = htmlspecialchars($_POST['productoNombre']);
        $descricion = htmlspecialchars($_POST['productoDescripcion']);
        $precio = htmlspecialchars($_POST['productoPrecio']);
        $result = mysqli_query($con2, "Select * from productos"); //Realizamos la seccion de todos los registros de la tabla de las imagenes.
        ?>
        <form enctype="multipart/form-data" action="updateDatos.php" method="post" name="agregar">
            <table align="center">
                <p align="center"><input type="hidden" name="idUpdate" value="<?php echo $produId; ?>"  /></p>
                <p align="center">NOMBRE:<input type="text" name="nombreUpdate" value="<?php echo $nombre; ?>"  /></p>
                <p align="center">DESCRIPCION:<input type="text"  name="descripcionUpdate" value="<?php echo $descricion; ?>"  /></p>
                <p align="center">PRECIO:<input type="text" name="precioUpdate" value="<?php echo $precio; ?>" /></p>
                <p align="center"><input type="submit" value="Guardar Cambios" /></p>
            </table>                            
        </form>

    </body>
</html>
