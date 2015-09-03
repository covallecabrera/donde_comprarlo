<?php

require_once 'db_conexion.php';
require_once 'db_conexion2.php';

if ((isset($_POST['categoria'])) && ($_POST['categoria'] != '')) {

                        $categoria = htmlspecialchars($_POST['categoria']);
                        
                        mysqli_query($con, "INSERT INTO categoria (nombre_categoria) VALUES ('" . $categoria . "')");
                        mysqli_query($con2, "INSERT INTO categoria (nombre_categoria) VALUES ('" . $categoria . "')");

                        			
                        echo "<SCRIPT>window.close() </SCRIPT>";
          
}
?>

