<?php

require_once ('Conexion.php');
require_once ('../db_conexion.php'); 
require_once ('simple_html_dom.php');


set_time_limit(2000);

$url = $_POST['url'];
$id_tienda = $_POST['idtienda'];
$result=mysqli_query($con, "Select * from parametros_tienda where tienda_id_tienda=".$id_tienda);
while($row = mysqli_fetch_array($result)){
    $tag_url = $row['tag_url'] ;
    $tag_nombre = $row['tag_nombre'];
    $tag_precio = $row['tag_precio'];
    $tag_descripcion = $row['tag_descripcion'];
    $tag_imagen = $row['tag_imagen'];
    $tag_marca = $row['tag_marca'];
}
//$url = 'http://www.ripley.cl/ripley-chile/moda/calzado-mujer/botas-y-botines';
// si servidor tiene en php.ini permiso allow_url_fopen = On  entonces usar file_get_html

    $curl = curl_init(); 
    curl_setopt($curl, CURLOPT_URL, $url);  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);  
    $str = curl_exec($curl);  
    curl_close($curl);  

$web = tomaDatos($str,$con,$tag_url);

$cantidad = count($web);
for ($k = 0; $k < $cantidad; $k++) {

    $curl = curl_init(); 
    curl_setopt($curl, CURLOPT_URL, $web[$k]);  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);  
    $str = curl_exec($curl);  
    curl_close($curl);  

    $url = str_get_html($str);
    $nombre[$k] = tomaNombre($url,$con,$tag_nombre);
    $precio[$k] = tomaPrecio($url,$tag_precio);
    $imagenes[$k] = tomaImagenes($url,$tag_imagen);
    $marca[$k] = tomaMarca($url,$con,$tag_marca);
    $descricion[$k] = tomaDescripcion($url,$con,$marca[$k],$tag_descripcion);
    $categoria[$k] = tomaCategoria($url,$con,$tag_nombre);
    $sucursal[$k] = $id_tienda;
}

 $respuesta = ingreso($nombre, $precio, $imagenes, $descricion, $categoria, $marca, $sucursal, $cantidad, $con);
            ?>
            <script type="text/javascript">
                    alert("Proceso Terminado!");
                    // window.close();
                    window.history.back();

            </script>                   
            <?php



/*
 * 
 */

function tomaDatos($str,$con,$tag_url) {                          //Toma del link del Producto
    $i = 0;


    $html= str_get_html($str); 

    $sqlSubCategoria = mysqli_query($con, "Select * from sub_categoria");
    
    while ($puntero = mysqli_fetch_array($sqlSubCategoria)) {
        $subCategoria = strtoupper($puntero['nombre_sub_categoria']);

        $sqlMarca = ("Select * from marca ");
        $result = mysqli_query($con,$sqlMarca);
            
        while ($row = mysqli_fetch_array($result)) {

            $marca1 = $row['nombre_marca'];
            $marca = strtoupper($marca1);   
           //echo "1";
            foreach ($html->find($tag_url) as $link) {
                if (strstr($link->plaintext, $marca)) {
                    if (strstr($link->plaintext, $subCategoria)) {
                        $web[$i] = $link->href;
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

function tomaNombre($web,$con,$tag_nombre) {                     //Toma del nombre de cada producto
    $html = $web;
    $sqlSubCategoria = mysqli_query($con, "Select * from sub_categoria");
    while ($puntero = mysqli_fetch_array($sqlSubCategoria)) {
        $subCategoria = strtoupper($puntero['nombre_sub_categoria']);
        foreach ($html->find($tag_nombre) as $nombre) {
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

function tomaPrecio($web,$tag_precio) {                     //Toma del precio del producto
    $html = $web;

    foreach ($html->find($tag_precio) as $precio) {
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

function tomaImagenes($web,$tag_imagen) {                //Toma de las imagenes del producto
    $html = $web;
    $i = 0;
    foreach ($html->find($tag_imagen) as $imagen) {
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

function tomaDescripcion($web,$con,$marca,$tag_descripcion) {           //Toma de la descripcion del producto
    $html = $web;
    $i = 0;
    $x = 0;

    $sqlMarca = mysqli_query($con, "Select * from marca");
    while ($row = mysqli_fetch_array($sqlMarca)) {
        if($marca == $row["id_marca"]){
            $marca1 = strtoupper($row["nombre_marca"]);
        }
    } 

        foreach ($html->find($tag_descripcion) as $descripcion) {
            
            if ($i == 0) {

               if (strstr($descripcion,$marca1)) {
                    
                    $result = strval($descripcion->plaintext);

                    $i+=1;
                }
            
            }
        }   

        return $result;
          
}

function tomaCategoria($web,$con,$tag_nombre) {          //Toma de la categoria del producto
    $html = $web;
    $sqlSubCategoria = mysqli_query($con, "Select * from sub_categoria");
    while ($puntero = mysqli_fetch_array($sqlSubCategoria)) {
        $subCategoria = strtoupper($puntero['nombre_sub_categoria']);
        foreach ($html->find($tag_nombre) as $nombre) {
            if (strstr($nombre, $subCategoria)) {
                $result = $puntero['id_sub_categoria'];
            }
        }
    }
    return $result;
}

function tomaMarca($web,$con,$tag_marca) {                      //Toma de la marca del producto
    $html = $web;
    $sqlMarca = mysqli_query($con, "Select * from marca");
    while ($row = mysqli_fetch_array($sqlMarca)) {
        $marca1 = $row['nombre_marca'];
        $marca = strtoupper($marca1);
        foreach ($html->find($tag_marca) as $nombre) {
            if (strstr($nombre->plaintext, $marca)) {
                $result = $row['id_marca'];
            }
        }
    }
    return $result;
}
?>
