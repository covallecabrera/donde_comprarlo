<?php

require_once('../db_conexion.php'); //importamos el archivo de conexión 

    $tag_url = $_POST['url_producto'];
    $tag_nombre = $_POST['nombre_producto'];
    $tag_precio = $_POST['precio_producto'];
    $tag_descripcion = $_POST['descripcion_producto'];
    $tag_imagen = $_POST['imagen_producto'];
    $id_tienda = $_POST['id_tienda'];
    $tag_marca = $_POST['marca_producto'];
    $hacer = 'insert';
        $result = mysqli_query($con, "Select * from parametros_tienda where tienda_id_tienda=" . $id_tienda . "");
            while ($row = mysqli_fetch_array($result)) {
                if($row['tienda_id_tienda']==$id_tienda){
                	$hacer = 'update';
                }
            }     
    if ($hacer == 'insert'){
    mysqli_query($con, "INSERT INTO parametros_tienda (tag_url,tag_nombre,tag_precio,tag_descripcion,tag_imagen,tag_marca,tienda_id_tienda) VALUES ('" . $tag_url . "','".$tag_nombre."','".$tag_precio."','".$tag_descripcion."','".$tag_imagen."','".$tag_marca."',".$id_tienda.")");
    }elseif ($hacer == 'update'){
    mysqli_query($con, "UPDATE parametros_tienda SET tag_url='".$tag_url."',tag_nombre='".$tag_nombre."',tag_precio='".$tag_precio."',tag_descripcion='".$tag_descripcion."',tag_imagen='".$tag_imagen."',tag_marca = '".$tag_marca."' WHERE tienda_id_tienda='".$id_tienda."'");
    }
	         ?>
	        <script type="text/javascript">
	  				alert("Cambios Guardados con exito!");
	  				window.history.back();
			</script>           		
	        <?php

?>