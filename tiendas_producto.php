<?php

/*
 * Following code will list all the imagenes de producto
 */

// array for JSON response
$response = array();


// include db connect class
require_once 'db_connect.php';


// connecting to db
$db = new DB_CONNECT();

$buscar = $_GET["buscar"];


// get all products from products table
$result = mysql_query("SELECT  *
         FROM productos 
         INNER JOIN sub_categoria ON sub_categoria.id_sub_categoria = productos.sub_categoria_id_sub_categoria
         INNER JOIN categoria ON categoria.id_categoria = sub_categoria.categoria_id_categoria
         INNER JOIN marca on marca.id_marca = productos.marca_id_marca
         INNER JOIN imagen on imagen.productos_id_productos = productos.id_productos
         INNER JOIN tienda_has_productos on tienda_has_productos.productos_id_productos = productos.id_productos
          INNER JOIN tienda ON tienda.id_tienda = tienda_has_productos.tienda_id_tienda
          INNER JOIN tienda_sucursal ON tienda_sucursal.tienda_id_tienda = tienda.id_tienda
        WHERE productos.id_productos = " . $buscar . " 
            GROUP BY tienda.id_tienda
         ORDER BY marca.nombre_marca ASC , productos.nombre_producto ASC ") or die(mysql_error());


// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["tiendas"] = array();

    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $tiendas = array();
        $tiendas["id_tienda"] = $row["id_tienda"];
        $tiendas["nombre_tienda"] = $row["nombre_tienda"];
        $tiendas["precio_producto"] = $row["precio_producto"];
       $tiendas["id_tienda_sucursal"] = $row["id_tienda_sucursal"];
        $tiendas["latitud"] = $row["latitud"];
        $tiendas["longitud"] = $row["longitud"];
       $tiendas["direccion_sucursal"] = $row["direccion_sucursal"];


        //$product["created_at"] = $row["created_at"];
        //$product["updated_at"] = $row["updated_at"];
        // push single product into final response array
        array_push($response["tiendas"], $tiendas);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No se encontraron Tiendas";

    // echo no users JSON
    echo json_encode($response);
}
?>
