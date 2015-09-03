<?php

require_once 'db_conexion2.php';

if ((isset($_POST['idUpdate'])) && ($_POST['idUpdate'] != '')) {
    if ((isset($_POST['nombreUpdate'])) && ($_POST['nombreUpdate'] != '')) {
        if ((isset($_POST['descripcionUpdate'])) && ($_POST['descripcionUpdate'] != '')) {
            if ((isset($_POST['precioUpdate'])) && ($_POST['precioUpdate'] != '')) {

                $produId = htmlspecialchars($_POST['idUpdate']);
                $nombre = htmlspecialchars($_POST['nombreUpdate']);
                $descricion = htmlspecialchars($_POST['descripcionUpdate']);
                $precio = htmlspecialchars($_POST['precioUpdate']);
                mysqli_query($con2, "UPDATE productos SET nombre_producto='".$nombre."',descripcion_producto='".$descricion."' WHERE id_productos='".$produId."'");
                mysqli_query($con2, "UPDATE tienda_has_productos SET precio_producto='".$precio."' WHERE productos_id_productos='".$produId."'");
            
                echo "<SCRIPT>window.close();</SCRIPT>";
            }
        }
    }
}
?>
