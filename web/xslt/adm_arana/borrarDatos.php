<?php
require_once '../db_conexion.php';
if ((isset($_POST['Eliminar'])) && ($_POST['Eliminar'] != '')) {
$dato=htmlspecialchars($_POST['Eliminar']);
mysqli_query($con, "Delete from tienda_has_productos Where productos_id_productos='" . $dato . "' ");
mysqli_query($con, "Delete from imagen Where productos_id_productos='" . $dato . "' ");
mysqli_query($con, "Delete from productos Where id_productos='" . $dato . "' ");
//echo "<SCRIPT>window.close() </SCRIPT>";
}

?>

<script type="text/javascript">
 				// window.history.back();
 				alert("Producto eliminado exitosamente");
 				window.location.replace(document.referrer);
			</script>
