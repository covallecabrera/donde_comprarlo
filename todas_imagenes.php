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

$buscar=$_GET["buscar"];
  

// get all products from products table
$result = mysql_query("SELECT *
from imagen
INNER JOIN productos on imagen.productos_id_productos = productos.id_productos
WHERE productos.id_productos = ".$buscar." ") or die(mysql_error());


// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["imagenes"] = array();

    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $imagenes = array();
        $imagenes["id_imagen"] = $row["id_imagen"];
        $imagenes["url_imagen"] = $row["url_imagen"];

        //$product["created_at"] = $row["created_at"];
        //$product["updated_at"] = $row["updated_at"];



        // push single product into final response array
        array_push($response["imagenes"], $imagenes);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No se encontraron Imagenes";

    // echo no users JSON
    echo json_encode($response);  
}
?>
