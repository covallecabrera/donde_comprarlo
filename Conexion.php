<?php

require_once 'db_connect.php';

function ingreso($producto) {
$db= new DB_CONNECT();    
//$db=mysqli_connect('localhost', 'root', '123', 'donde_comprarlo');
  //  $link = mysql_connect("localhost", "root"."123");
   
    //mysql_select_db("donde_comprarlo",$db);
    $k = 0;
    foreach ($producto as $productos) {
        
        $result3=mysql_query($db,"INSERT INTO productos ('nombre_producto','descripcion_producto','categoria_id_categoria','marca_id_marca') VALUES ('" . $producto[$k]['nombre'] . ",'" . $producto[$k]['descripcion'] . "','" . $producto[$k]['categoria'] . "','" . $producto[$k]['marca'] . "')");
        $result = mysql_query("SELECT id_productos FROM productos" 
                . " where nombre_producto like '%" . $producto[$k]['nombre'] . "%' ") or die(mysql_error());
        for ($v = 0; empty($producto[$v]['imagenes']) == true; $v++) {
        $result3=    mysql_query($db,"INSERT INTO imagen ('url_imagen','productos_id_productos') VALUES ('" . $producto[$v]['imagenes'] . ",".$result["id_productos"]."')");
            
        }
        $result3=mysql_query( $db,"INSERT INTO precio_surcursal ('precio_sucursal') VALUES ('" . $producto[$k]['precio'] . "')");
        $result1 = mysql_query("SELECT max(id_precio_sucursal) FROM precio_sucursal") or die(mysql_error());
        $result3=mysql_query($db,"INSERT INTO tienda_sucursal_has_productos ('tienda_sucursal_id_sucursal','productos_id_productos','precio_sucursal_id_precio_sucursal') VALUES ('".$producto[$k]['sucursal']."," . $result["id_productos"] . ",".$result["id_precio_sucursal"]."')");
        $k+=1;
    }
}

?>