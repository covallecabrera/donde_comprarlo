<?php

require_once 'db_conexion.php';

$produId = htmlspecialchars($_POST['productoId']);

mysqli_query($con, "UPDATE productos SET estado_producto= 1 WHERE id_productos = '".$produId."'");


        ?>
        <script type="text/javascript">
                alert("Producto Agregado Correctamente!");
                window.location.replace(document.referrer);
        </script>                   
        <?php

?>
