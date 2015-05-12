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
$categoria=$_GET["categoria"];
$marca=$_GET["marca"];
$rango=$_GET["rango"];
$precio_max=$_GET["precio_max"];

// get all products from products table
$result = mysql_query("SELECT * FROM productos where nombre_producto like '%".$buscar."%' ") or die(mysql_error());
/*
 SELECT * FROM `productos` p 
INNER JOIN `categoria` c 
ON c.id_categoria = p.categoria_id_categoria
INNER JOIN `marca`m
ON m.id_marca = p.marca_id_marca
WHERE c.nombre_categoria = 'Botas'
AND m.nombre_marca = 'Gacel'
AND p.precio_producto < 100000
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
        $productos["imagen_producto1"] = $row["imagen_producto1"];

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
    $response["message"] = "No se encontraron Productos";

    // echo no users JSON
    echo json_encode($response);
}
?>
