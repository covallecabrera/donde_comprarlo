<?php

require_once 'db_conexion.php';
require_once 'db_conexion2.php';

if ((isset($_POST['marca'])) && ($_POST['marca'] != '')) {
     $marca = $_POST['marca'];

                       
          

         mysqli_query($con, "INSERT INTO marca (nombre_marca) VALUES ('" . $marca . "')");
         mysqli_query($con2, "INSERT INTO marca (nombre_marca) VALUES ('" . $marca . "')");
              
        // return(true);    
        echo "<SCRIPT>window.close() </SCRIPT>";            
}
?>