<?php

require 'Conexion.php';
require 'simple_html_dom.php';
set_time_limit(200);
$url = 'http://www.ripley.cl/ripley-chile/moda/calzado-mujer/botas-y-botines';

$web = tomaDatos($url);
//print_r($web);
for ($k = 0; $k < count($web); $k++) {
    $url = file_get_html($web[$k]);
    $nombre[$k] = tomaNombre($web[$k]);
    $precio[$k] = tomaPrecio($url);
    $imagen[$k] = tomaImagenes($url);
    $descricion[$k] = tomaDescripcion($url);
    $categoria[$k] = tomaCategoria($url);
    $marca[$k] = tomaMarca($url);
    $producto[$k] = array("nombre" => $nombre[$k],
        "precio" => $precio[$k],
        "imagenes" => $imagen[$k],
        "descripcion" => $descricion[$k],
        "marca" => $marca[$k],
        "categoria" => $categoria[$k],
        "sucursal" => "Ripley"
    );
}

//ingreso($producto);
/*
  $stp = script($url);
  $web = tomaDatos($stp);
  for ($k = 0; $k < count($web); $k++) {
  $url = file_get_html($web[$k]);
  $nombre[$k] = tomaNombre($web[$k]);
  $precio[$k] = tomaPrecio($url);
  $imagen[$k] = tomaImagenes($url);
  $descricion[$k] = tomaDescripcion($url);
  $producto[$k] = array("nombre" => $nombre[$k],
  "precio" => $precio[$k],
  "imagenes" => $imagen[$k],
  "descripcion" => $descricion[$k]
  );
  }

 */
print_r($producto);







/*
 * 
 */

function tomaDatos($url) {


    $html = file_get_html($url);
    $i = 0;

    foreach ($html->find('a') as $link) {

        if (strstr($link->title, "AZALEIA")) {
            if (strstr($link->title, "BOT")) {
                //echo $link->title . '<br>';


                $web[$i] = $link->href;

                $i+=1;

                //echo $web[$i];
            }
        }
    }
    return $web;
}

/*
 * 
 */

function tomaNombre($web) {
    $html = file_get_html($web);

    foreach ($html->find('span[class="breadcrumb_current"]') as $nombre) {
        if (strstr($nombre->plaintext, "BOT")) {
            $result = $nombre->plaintext;
            //echo $result."<br>";
        }
    }
    return $result;
}

/*
 * 
 */

function tomaPrecio($web) {
    $html = $web;

    foreach ($html->find('p') as $precio) {
        if ($precio != null) {
            if (strstr($precio, "Oferta")) {
                //$precio1=$precio;
                $result = trim($precio);
                //echo  $result."<br>";
            }
        }
    }
    return $result;
}

/*
 * 
 */

function tomaImagenes($web) {
    $html = $web;
    $i = 0;
    foreach ($html->find('img') as $imagen) {
        if (strstr($imagen->src, "WOP")) {
            if ($i != 0) {
                $result[$i] = "http://www.ripley.cl" . $imagen->src;
                //echo $result[$i]."<br>";
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

function tomaDescripcion($web) {
    $html = $web;
    $i = 0;
    $x = 0;
    foreach ($html->find('p') as $descripcion) {
        //$result=$descripcion->find('p');
        if ($i == 0) {
            if (strstr($descripcion, "Ripley")) {
                
            } elseif (strstr($descripcion, "!")) {

                $result = $descripcion->plaintext;
                //echo $result;    
                $i+=1;
            }
        }
    }
    return $result;
}

/*
  function script($web){
  $html = file_get_html($web);
  foreach ($html->find('script') as $script){
  echo '<script>';
  echo subscribe("2","24","WC_SearchBasedNavigationResults_pagination_link_2_categoryResults");
  echo '</script>';
  }

  return $html;
  }
 */

function tomaCategoria($web) {
    $html = $web;

    foreach ($html->find('span[class="breadcrumb_current"]') as $nombre) {
        if (strstr($nombre->plaintext, "BOTIN")) {
            $result = "1";
        }
        if (strstr($nombre->plaintext, "BOTA")) {
            $result = "2";
        }
    }
    return $result;
}

function tomaMarca($web) {
    $html = $web;

    foreach ($html->find('span[class="breadcrumb_current"]') as $nombre) {
        if (strstr($nombre->plaintext, "AZALEIA")) {
            $result = "1";
        }
        if (strstr($nombre->plaintext, "GACEL")) {
            $result = "2";
        }
        if (strstr($nombre->plaintext, "NATURALIZER")) {
            $result = "3";
        }
        if (strstr($nombre->plaintext, "16HRS")) {
            $result = "4";
        }
        if (strstr($nombre->plaintext, "POLLINI")) {
            $result = "5";
        }
    }
    return $result;
}

?>
