<?php

require_once 'db_conexion2.php';
require_once 'db_conexion.php';

if ((isset($_POST['productoId'])) && ($_POST['productoId'] != '')) {
    if ((isset($_POST['productoNombre'])) && ($_POST['productoNombre'] != '')) {
        if ((isset($_POST['productoDescripcion'])) && ($_POST['productoDescripcion'] != '')) {
            if ((isset($_POST['productoPrecio'])) && ($_POST['productoPrecio'] != '')) {
                if ((isset($_POST['productoMarca'])) && ($_POST['productoMarca'] != '')) {
                    if ((isset($_POST['productoCategoria'])) && ($_POST['productoCategoria'] != '')) {
                        $produId = htmlspecialchars($_POST['productoId']);
                        $nombre = htmlspecialchars($_POST['productoNombre']);
                        $descricion = htmlspecialchars($_POST['productoDescripcion']);
                        $precio = htmlspecialchars($_POST['productoPrecio']);
                        $marca = htmlspecialchars($_POST['productoMarca']);
                        $categoria = htmlspecialchars($_POST['productoCategoria']);
                        mysqli_query($con, "INSERT INTO productos (id_productos,nombre_producto,descripcion_producto,marca_id_marca,sub_categoria_id_sub_categoria) VALUES ('" . $produId . "','" . $nombre . "','" . $descricion . "','" . $marca . "','" . $categoria . "')");

                        $query = "SELECT * FROM tienda_has_productos WHERE productos_id_productos='" . $produId . "'";
                        $result4 = mysqli_query($con2, $query);

                        while ($row4 = mysqli_fetch_array($result4)) {
                            mysqli_query($con, "INSERT INTO tienda_has_productos (tienda_id_tienda,productos_id_productos,precio_producto) VALUES ('" . $row4['tienda_id_tienda'] . "','" . $produId . "','" . $precio . "')");
                        }

                        $result3 = mysqli_query($con2, "Select * from imagen where productos_id_productos='" . $produId . "'");
                        //mysqli_query($con, "INSERT INTO $bd.imagen SELECT * from $db2.imagen where productos_id_productos='" . $row['id_productos'] . "'");
                        $i = 0;
                        while ($row3 = mysqli_fetch_array($result3)) {
                            $imagen[$i] = $row3['url_imagen'];
                            $i+=1;
                        }
                        
                        for ($x=0;$x<count($imagen);$x++) {
                            mysqli_query($con, "INSERT INTO imagen (url_imagen,productos_id_productos) VALUES ('".$imagen[$x]."','" . $produId . "')");
                        
                        }
                        $dato=$produId;
                        mysqli_query($con2, "Delete from tienda_has_productos Where productos_id_productos='" . $dato . "' ");
                        mysqli_query($con2, "Delete from imagen Where productos_id_productos='" . $dato . "' ");
			mysqli_query($con2, "Delete from productos Where id_productos='" . $dato . "' ");
                         
                       
                        echo "<SCRIPT>window.close() </SCRIPT>";
                    }
                }
            }
        }
    }
}
?>