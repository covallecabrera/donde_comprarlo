<?php

require_once 'db_conexion.php';
require_once 'db_conexion2.php';

if ((isset($_POST['subcategoria'])) && ($_POST['subcategoria'] != '')) {

                        $subcategoria = $_POST['subcategoria'];
                        $idcategoria=$_POST['idcategoria'];
                        mysqli_query($con, "INSERT INTO sub_categoria (nombre_sub_categoria,categoria_id_categoria) VALUES ('" . $subcategoria . "','".$idcategoria."')");
                        mysqli_query($con2, "INSERT INTO sub_categoria (nombre_sub_categoria,categoria_id_categoria) VALUES ('" . $subcategoria . "','".$idcategoria."')");

                        		
                    echo "<SCRIPT>window.close() </SCRIPT>";
          
}
?>