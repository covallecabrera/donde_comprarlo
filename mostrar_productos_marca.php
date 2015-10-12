<?php

/*
 * Following code will list all the products
 */

// array for JSON response
  $response = array();


// include db connect class
require_once 'db_connect.php';


// connecting to db
 $db = new DB_CONNECT();

$buscar=$_GET["buscar"];
$buscar1=$_GET["buscar1"];
$texto=$_GET["texto"];
// get all products from products table
$result = mysql_query("SELECT DISTINCT *
         FROM productos 
         INNER JOIN sub_categoria ON sub_categoria.id_sub_categoria = productos.sub_categoria_id_sub_categoria
         INNER JOIN categoria ON categoria.id_categoria = sub_categoria.categoria_id_categoria
         INNER JOIN marca on marca.id_marca = productos.marca_id_marca
         INNER JOIN imagen on imagen.productos_id_productos = productos.id_productos
         INNER JOIN tienda_has_productos on tienda_has_productos.productos_id_productos = productos.id_productos
          INNER JOIN tienda ON tienda.id_tienda = tienda_has_productos.tienda_id_tienda
    INNER JOIN tienda_sucursal ON tienda_sucursal.tienda_id_tienda = tienda.id_tienda
         WHERE productos.nombre_producto like '%".$texto."%'
         AND marca.id_marca = ".$buscar1."
         AND sub_categoria.id_sub_categoria = ".$buscar." 
         AND productos.estado_producto = 1
         GROUP BY productos.id_productos
         ORDER BY productos.id_productos ASC") or die(mysql_error());
/* 
         WHERE productos.nombre_producto like '%".$texto."%'
         AND marca.id_marca = ".$buscar1."
         AND sub_categoria.id_sub_categoria = ".$buscar." 
         GROUP BY productos.id_productos
         ORDER BY productos.id_productos ASC
 */


// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["productos"] = array();
 
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $productos = array();
        $productos["id_productos"] = $row["id_productos"];
        $productos["nombre_producto"] = $row["nombre_producto"];
        $productos["descripcion_producto"] = $row["descripcion_producto"];
        $productos["precio_producto"] = $row["precio_producto"];
        $productos["url_imagen"] = $row["url_imagen"];

        //$product["created_at"] = $row["created_at"];
        //$product["updated_at"] = $row["updated_at"];



        // push single product into final response array
        array_push($response["productos"], $productos);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No se encontraron productos";

    // echo no users JSON
    echo json_encode($response);
}
?>


