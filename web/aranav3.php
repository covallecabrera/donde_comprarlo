<?php
require_once ('Conexion.php');
require_once ('db_conexion.php'); 
require_once ('simple_html_dom.php');
//require '../db_connect.php';

set_time_limit(2000);

$url = $_POST['url'];
//$url = 'http://www.ripley.cl/ripley-chile/moda/calzado-mujer/botas-y-botines';

$web = tomaDatos($url,$con);

$cantidad = count($web);
for ($k = 0; $k < $cantidad; $k++) {
    $url = file_get_html($web[$k]);
    $nombre[$k] = tomaNombre($url,$con);
    $precio[$k] = tomaPrecio($url);
    $imagenes[$k] = tomaImagenes($url);
    $descricion[$k] = tomaDescripcion($url,$con);
    $categoria[$k] = tomaCategoria($url,$con);
    $marca[$k] = tomaMarca($url,$con);
    $sucursal[$k] = "1";
}

 $respuesta = ingreso($nombre, $precio, $imagenes, $descricion, $categoria, $marca, $sucursal, $cantidad);
 echo "PROCESO TERMINADO";

// print_r($producto);
/* echo "<SCRIPT>"
  . "window.open('Popup.php', 'POPUP', 'top=300,left=300,width=200,height=50');"
  . "window.close();"
  . "</SCRIPT>"; */



/*
 * 
 */

function tomaDatos($url,$con) {                          //Toma del link del Producto
    $i = 0;
    $html = file_get_html($url);
   
    $sqlSubCategoria = mysqli_query($con, "Select * from sub_categoria");
    
    while ($puntero = mysqli_fetch_array($sqlSubCategoria)) {
        $subCategoria = strtoupper($puntero['nombre_sub_categoria']);

        $sqlMarca = ("Select * from marca ");
        $result = mysqli_query($con,$sqlMarca);
            
        while ($row = mysqli_fetch_array($result)) {

            $marca1 = $row['nombre_marca'];
            $marca = strtoupper($marca1);   
           //echo "1";
            foreach ($html->find('a') as $link) {
                if (strstr($link->plaintext, $marca)) {
                    if (strstr($link->plaintext, $subCategoria)) {
                        $web[$i] = $link->href;
                        //echo $web[$i];
                        $i+=1;
                    }
                }
            }
        }
    }
    return $web;
}

/*
 * 
 */

function tomaNombre($web,$con) {                     //Toma del nombre de cada producto
    $html = $web;
    $sqlSubCategoria = mysqli_query($con, "Select * from sub_categoria");
    while ($puntero = mysqli_fetch_array($sqlSubCategoria)) {
        $subCategoria = strtoupper($puntero['nombre_sub_categoria']);
        foreach ($html->find('span[class="breadcrumb_current"]') as $nombre) {
            if (strstr($nombre->plaintext, $subCategoria)) {
                $result = strval($nombre->plaintext);
            }
        }
    }
    return $result;
}

/*
 * 
 */

function tomaPrecio($web) {                     //Toma del precio del producto
    $html = $web;

    foreach ($html->find('p') as $precio) {
        if ($precio != null) {
            if (strstr($precio, "Normal")) {

                $result = strval($precio->plaintext);
                $result = substr($result, 9);
                $result = str_replace('.', '', $result);
            }
        }
    }

    return $result;
}

/*
 * 
 */

function tomaImagenes($web) {                //Toma de las imagenes del producto
    $html = $web;
    $i = 0;
    foreach ($html->find('img') as $imagen) {
        if (strstr($imagen->src, "WOP")) {
            if ($i != 0) {
                $result[$i] = "http://www.ripley.cl" . $imagen->src;

                $result[$i] = strval($result[$i]);

                $i+=1;
            } else {
                $i+=1;
            }
        }
    }
    return $result;
}

/*
 * 
 */

function tomaDescripcion($web,$con) {           //Toma de la descripcion del producto
    $html = $web;
    $i = 0;
    $x = 0;

    $sqlMarca = mysqli_query($con, "Select * from marca");
    while ($row = mysqli_fetch_array($sqlMarca)) {
        //echo $row['nombre_marca'];
        foreach ($html->find('p') as $descripcion) {

            if ($i == 0) {
                if (strstr($descripcion, "Ripley")){
               }elseif (strstr($descripcion, $row['nombre_marca'])) {

                    $result = strval($descripcion->plaintext);

                    $i+=1;
                }
            
       }
    }
    return $result;
}
}

function tomaCategoria($web,$con) {          //Toma de la categoria del producto
    $html = $web;
    $sqlSubCategoria = mysqli_query($con, "Select * from sub_categoria");
    while ($puntero = mysqli_fetch_array($sqlSubCategoria)) {
        $subCategoria = strtoupper($puntero['nombre_sub_categoria']);
        foreach ($html->find('span[class="breadcrumb_current"]') as $nombre) {
            if (strstr($nombre, $subCategoria)) {
                $result = $puntero['id_sub_categoria'];
            }
        }
    }
    return $result;
}

function tomaMarca($web,$con) {                      //Toma de la marca del producto
    $html = $web;
    $sqlMarca = mysqli_query($con, "Select * from marca");
    while ($row = mysqli_fetch_array($sqlMarca)) {
        $marca1 = $row['nombre_marca'];
        $marca = strtoupper($marca1);
        foreach ($html->find('span[class="breadcrumb_current"]') as $nombre) {
            if (strstr($nombre->plaintext, $marca)) {
                $result = $row['id_marca'];
            }
        }
    }
    return $result;
}
