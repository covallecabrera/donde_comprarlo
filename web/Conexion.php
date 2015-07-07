<?php

//require_once 'db_conexion.php';
require_once '../db_config.php';

function ingreso($nombre, $precio, $imagenes, $descricion, $categoria, $marca, $sucursal, $cantidad) {
    $server = DB_SERVER;
    $bd = 'donde_comprarlo_copia';
    $user = DB_USER;
    $pas = DB_PASSWORD;

    $con = mysqli_connect($server, $user, $pas, $bd);

//$db= new DB_CONNECT();    
//$db=mysqli_connect('localhost', 'root', '123', 'donde_comprarlo');
    //  $link = mysql_connect("localhost", "root"."123");
    //mysql_select_db("donde_comprarlo",$db);

    for ($k = 0; $k < $cantidad; $k++) {
		
        $query = "INSERT INTO productos (nombre_producto,descripcion_producto,marca_id_marca,sub_categoria_id_sub_categoria) VALUES ('".$nombre[$k]."','".$descricion[$k]."','".$marca[$k]."','".$categoria[$k]."')";
        $result3 = mysqli_query($con, $query);
        //mysqli_close($con);

        //$con = mysqli_connect($server, $user, $pas, $bd);
        $query = "SELECT * FROM productos WHERE nombre_producto='" . $nombre[$k] . "'";
        $result = mysqli_query($con, $query); //or die(mysql_error());
        //mysqli_close($con);
        if ($row = mysqli_fetch_array($result)) {
        //    $con = mysqli_connect($server, $user, $pas, $bd);
            $resultado = $row["id_productos"];
            $query = "INSERT INTO tienda_has_productos (tienda_id_tienda,productos_id_productos,precio_producto) VALUES ('".$sucursal[$k]."','".$resultado."','".$precio[$k]."')";
            $result3 = mysqli_query($con, $query);
         //   mysqli_close($con);
        }
        // $con = mysqli_connect($server, $user, $pas, $bd);
        for ($v = 1; $v<7; $v++) {
            
            //$con = mysqli_connect($server, $user, $pas, $bd);
            $imagen = $imagenes[$k][$v];
            if($imagen!=""){    
            $query = "INSERT INTO imagen (url_imagen,productos_id_productos) VALUES ('".$imagen."','".$resultado."')";
            $result3 = mysqli_query($con, $query);
            } 
        }
       
    
	}
	 mysqli_close($con);
    return "Paso";
}

?>