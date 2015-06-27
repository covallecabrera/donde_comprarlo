<?php

require 'arana/simple_html_dom.php';
set_time_limit(200);
$url = 'http://www.falabella.com/falabella-cl/category/cat690245/Botines';
$par=  file_get_html($url);
$web = tomaDatos($par);
//print_r($web);
for ($k = 0; $k < count($web); $k++) {
    $pag = file_get_html($web[$k]);
    $nombre[$k] = tomaNombre($pag);
    $precio[$k] = tomaPrecio($pag);
    $imagen[$k] = tomaImagen($par);

    //$imagen[$k] = tomaImagenes($pag);
    //$descricion[$k] = tomaDescripcion($pag);
    $producto[$k] = array("nombre" => $nombre[$k],
        "precio" => $precio[$k],
        //"imagenes" => $imagen[$k],
       // "descripcion" => $descricion[$k]
    );
}

print_r($producto);







/*
 * 
 */

function tomaDatos($url) {

    $html = $url;

    $i = 0;
    foreach ($html->find('a') as $link) {

        if (strstr($link->title, "Clarks")) {

            //echo 'http://www.falabella.com'.$link->href . '<br>';
            $web[$i] = 'http://www.falabella.com' . $link->href;
            $i+=1;
            //echo $web[$i];
        }
    }
    return $web;
}

/*
 * 
 */

  function tomaNombre($web){
  $html= $web;

  foreach($html->find('div') as $nombre) {
  if($nombre->title!=null){
  $result= $nombre->title;
  //echo $nombre->title."<br>";
  }

  }
  return $result;
  }
 
/*
 * 
 */

  function tomaPrecio($web){
  $html=$web;

  foreach($html->find('div[class="precio1"]') as $precio) {
  if($precio!=null){
  //$precio1=$precio;
  $result=trim($precio);
  // echo  $result."<br>";
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
    //$contenedor=$html->find('div[id="contenedorScene7"]');
    foreach ($html->find('html') as $uno) {

        $trece = $uno;
        echo $trece . "<br>";

        //}
    }

//$link=$imagen->find('div');
    //$link1=$link->find('div');
    //$link2=$link1->find('div');
    //$link3=$link2->find('div');
    //$link4=$link3->find('div');
    //$link5=$link4->find('div[class="s7flyoutSwatch"]');
    //$link6=$link5->find('div[style="position: absolute;"]');
    //if($imagen->src!=null){
    //if(strstr($imagen1->alt,"Bo")){ 
    //$imagenes[$i]=$imagen1->src;
    //echo $imagenes[$i]."<br>";
    //$i+=1;
    //}
    //}
//return $imagenes;  
}

function tomaImagen($web){
   $html = $web;

    $i = 0;
    foreach ($html->find('img[class="lazy"]') as $imagen) {

        if (strstr($imagen->alt, "Clarks")) {
            if(strstr($imagen->src,"scene7")){

            $web[$i] = $imagen->data-original;
            $i+=1;
            echo $web[$i];
            }
        }
    }
    return $web; 
}

?>
