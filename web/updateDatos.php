<?php

require_once 'db_conexion.php';

if ((isset($_POST['idUpdate'])) && ($_POST['idUpdate'] != '')) {
    if ((isset($_POST['nombreUpdate'])) && ($_POST['nombreUpdate'] != '')) {
        if ((isset($_POST['descripcionUpdate'])) && ($_POST['descripcionUpdate'] != '')) {
            if ((isset($_POST['precioUpdate'])) && ($_POST['precioUpdate'] != '')) {

                $produId = htmlspecialchars($_POST['idUpdate']);
                $nombre = htmlspecialchars($_POST['nombreUpdate']);
                $descricion = htmlspecialchars($_POST['descripcionUpdate']);
                $precio = htmlspecialchars($_POST['precioUpdate']);
                mysqli_query($con, "UPDATE productos SET nombre_producto='".$nombre."',descripcion_producto='".$descricion."' WHERE id_productos='".$produId."'");
                mysqli_query($con, "UPDATE tienda_has_productos SET precio_producto='".$precio."' WHERE productos_id_productos='".$produId."'");
            ?>
                <script type="text/javascript">
                // window.history.back();
                // window.location.replace(document.referrer);
                alert("Producto modificado con exito");
                // window.close();

            </script>
            <?php
            }
        }
    }
}
?>
