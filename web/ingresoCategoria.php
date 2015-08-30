<?php

require_once 'db_conexion.php';


if ((isset($_POST['categoria'])) && ($_POST['categoria'] != '')) {

                        $categoria = htmlspecialchars($_POST['categoria']);
                        
                        mysqli_query($con, "INSERT INTO categoria (nombre_categoria) VALUES ('" . $categoria . "')");

                        			
                        echo "<SCRIPT>window.close() </SCRIPT>";
          
}
?>

