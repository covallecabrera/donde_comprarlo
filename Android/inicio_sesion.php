<?php

/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();


// include db connect class
require_once 'db_connect.php';

    $correo=$_GET["correo"];
    $contrasena = $_GET["contrasena"];


// connecting to db
$db = new DB_CONNECT();

// get all products from products table
$result = mysql_query("SELECT * FROM usuario where correo_usuario = '".$correo."'") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
 
    while ($row = mysql_fetch_array($result)) {
        $usuario = array();
        $usuario["contrasena_usuario"] = $row["contrasena_usuario"];
        if($usuario["contrasena_usuario"]==$contrasena){
            $response["success"] = 1;
            $response["nombre"] = $row["nombre_usuario"];
            $response["contrasena"] = $row["contrasena_usuario"];
            $response["id_usuario"]=$row["id_usuario"];
        }
        else{
            $response["success"] = 2;
        }

        // push single product into final response array
        array_push($response);
    }
    // success
    // $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;

    // echo no users JSON
    echo json_encode($response);
}
?>
