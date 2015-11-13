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
  

// get all products from products table
$result = mysql_query("SELECT DISTINCT marca.id_marca, marca.nombre_marca 
FROM marca
INNER JOIN productos ON productos.marca_id_marca = marca.id_marca
INNER JOIN sub_categoria on productos.sub_categoria_id_sub_categoria = sub_categoria.id_sub_categoria
WHERE sub_categoria.id_sub_categoria = ".$buscar." ") or die(mysql_error());
/*
 SELECT m.nombre_marca FROM categoria c 
INNER JOIN productos p on c.id_categoria = p.categoria_id_categoria
INNER JOIN marca m on m.id_marca=p.marca_id_marca
WHERE c.id_categoria = 2
*/

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["marca"] = array();

    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $marca = array();
        $marca["id_marca"] = $row["id_marca"];
        $marca["nombre_marca"] = $row["nombre_marca"];

        //$product["created_at"] = $row["created_at"];
        //$product["updated_at"] = $row["updated_at"];



        // push single product into final response array
        array_push($response["marca"], $marca);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No se encontraron Marcas";

    // echo no users JSON
    echo json_encode($response);  
}
?>
