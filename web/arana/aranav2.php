<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

    </head>
    <body>
        <?php
        require 'Conexion.php';
        require_once '../db_conexion.php';
        require 'simple_html_dom.php';

        set_time_limit(200);
//$url = 'http://www.ripley.cl/ripley-chile/moda/calzado-mujer/botas-y-botines';


        if ((isset($_POST['url'])) && ($_POST['url'] != '')) {

            $url = $_POST['url'];
            //$base = mysqli_query($con, "Select * from url") or die(mysql_error());
/*
            while ($row = mysqli_fetch_array($base)) {
                if ($url==$row['url']) {
                    $paso = 0;
                } else {
                    $paso = 1;
                }
            }
            
            if ($paso == 1) {*/
                $query = "INSERT INTO url (url) VALUES ('".$url."')";
                //Ejecutando el Query
                $result = mysqli_query($con, $query);

                mysqli_close($con); //cerramos la conexión
                $web = tomaDatos($_POST['url']);

                $cantidad = count($web);
                for ($k = 0; $k < $cantidad; $k++) {
                    $url = file_get_html($web[$k]);
                    $nombre[$k] = tomaNombre($url);
                    $precio[$k] = tomaPrecio($url);
                    $imagenes[$k] = tomaImagenes($url);
                    $descricion[$k] = tomaDescripcion($url);
                    $categoria[$k] = tomaCategoria($url);
                    $marca[$k] = tomaMarca($url);
                    $sucursal[$k] = "2";
                    //$producto[$k] = array("nombre" => $nombre[$k],
                    //  "precio" => $precio[$k],
                    //  "imagenes" => $imagenes[$k],
                    //  "descripcion" => $descricion[$k],
                    //  "marca" => $marca[$k],
                    //  "categoria" => $categoria[$k],
                    //  "sucursal" => "1"
                    //  ); 
                }

                $respuesta = ingreso($nombre, $precio, $imagenes, $descricion, $categoria, $marca, $sucursal, $cantidad);
                echo "PROCESO TERMINADO";
           // print_r($producto);
            echo "<SCRIPT>"
            . "window.open('Popup.php', 'POPUP', 'top=300,left=300,width=200,height=50');"
            . "window.close();"
            . "</SCRIPT>";
        }


        /*
         * 
         */

        function tomaDatos($url) {


            $html = file_get_html($url);
            $i = 0;

            foreach ($html->find('a') as $link) {

                if (strstr($link->plaintext, "INDEX")) {
                    if (strstr($link->plaintext, "BOT")) {



                        $web[$i] = $link->href;

                        $i+=1;
                    }
                }if (strstr($link->plaintext, "AZALEIA")) {
                    if (strstr($link->plaintext, "BOT")) {



                        $web[$i] = $link->href;

                        $i+=1;
                    }
                }if (strstr($link->plaintext, "POLLINI")) {
                    if (strstr($link->plaintext, "BOT")) {



                        $web[$i] = $link->href;

                        $i+=1;
                    }
                }if (strstr($link->plaintext, "16HRS")) {
                    if (strstr($link->plaintext, "BOT")) {



                        $web[$i] = $link->href;

                        $i+=1;
                    }
                }if (strstr($link->plaintext, "NATURALIZER")) {
                    if (strstr($link->plaintext, "BOT")) {



                        $web[$i] = $link->href;

                        $i+=1;
                    }
                }if (strstr($link->plaintext, "GACEL")) {
                    if (strstr($link->plaintext, "BOT")) {



                        $web[$i] = $link->href;

                        $i+=1;
                    }
                }
            }
            return $web;
        }

        /*
         * 
         */

        function tomaNombre($web) {
            $html = $web;

            foreach ($html->find('span[class="breadcrumb_current"]') as $nombre) {
                if (strstr($nombre->plaintext, "BOT")) {
                    $result = strval($nombre->plaintext);
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

        function tomaImagenes($web) {
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

        function tomaDescripcion($web) {
            $html = $web;
            $i = 0;
            $x = 0;
            foreach ($html->find('p') as $descripcion) {

                if ($i == 0) {
                    if (strstr($descripcion, "Ripley")) {
                        
                    } elseif (strstr($descripcion, "Index")) {

                        $result = strval($descripcion->plaintext);

                        $i+=1;
                    }
                }
            }
            return $result;
        }

        function tomaCategoria($web) {
            $html = $web;

            foreach ($html->find('span[class="breadcrumb_current"]') as $nombre) {
                if (strstr($nombre, "BOTIN")) {
                    $result = "1";
                }else{
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
                    $result = "3";
                }
                if (strstr($nombre->plaintext, "NATURALIZER")) {
                    $result = "4";
                }
                if (strstr($nombre->plaintext, "16HRS")) {
                    $result = "2";
                }
                if (strstr($nombre->plaintext, "POLLINI")) {
                    $result = "5";
                }
		if (strstr($nombre->plaintext, "INDEX")) {
                    $result = "6";
                }
            }
            return $result;
        }
        ?>
        <input name="boton" id="boton" type="button" value="cerrar" onclick="window.close()" disabled="disable">
    </body>
</html>
