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

// get all products from products table
$result = mysql_query("SELECT * FROM productos") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["productos"] = array();
 
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $productos = array();
        $productos["id_producto"] = $row["id_producto"];
        $productos["nombre_producto"] = $row["nombre_producto"];
        $productos["descripcion_producto"] = $row["descripcion_producto"];
        $productos["precio_producto"] = $row["precio_producto"];

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
