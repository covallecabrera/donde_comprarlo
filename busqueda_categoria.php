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
$result = mysql_query("SELECT * FROM categoria") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["categoria"] = array();
 
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $categoria = array();
        $categoria["id_categoria"] = $row["id_categoria"];
        $categoria["nombre_categoria"] = $row["nombre_categoria"];


        //$product["created_at"] = $row["created_at"];
        //$product["updated_at"] = $row["updated_at"];



        // push single product into final response array
        array_push($response["categoria"],  $categoria);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No se encontraron categorias";

    // echo no users JSON
    echo json_encode($response);
}
?>
