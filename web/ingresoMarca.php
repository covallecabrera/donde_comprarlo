<?php

require_once 'db_conexion.php';
require_once 'db_conexion2.php';

if ($_POST["marca"] != '') {
    

     $marca = $_POST['marca'];

         mysqli_query($con, "INSERT INTO marca (nombre_marca) VALUES ('" . $marca . "')");
         mysqli_query($con2, "INSERT INTO marca (nombre_marca) VALUES ('" . $marca . "')");
              
        // return(true);    
         ?>
        <script type="text/javascript">
  				alert("Marca Agregada Correctamente");
		</script>           		
        <?php
        echo "<SCRIPT>window.close() </SCRIPT>";            

}else{
      	?>
        <script type="text/javascript">
  				alert("Por favor, ingrese nombre de marca");
		</script>           		
        <?php
        echo "<SCRIPT>window.close() </SCRIPT>";   
}
?>