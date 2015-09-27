<?php

require_once 'db_conexion.php';
require_once 'db_conexion2.php';

if ($_POST["categoria"] !='') {

                        $categoria = htmlspecialchars($_POST['categoria']);
                        
                        mysqli_query($con, "INSERT INTO categoria (nombre_categoria) VALUES ('" . $categoria . "')");
                        mysqli_query($con2, "INSERT INTO categoria (nombre_categoria) VALUES ('" . $categoria . "')");
      	?>
        <script type="text/javascript">
  				alert("Categoria Agregada Correctamente!");
		</script>           		
        <?php
                        			
                        echo "<SCRIPT>window.close() </SCRIPT>";
          
}else{
	      	?>
        <script type="text/javascript">
  				alert("Por favor ingrese Categoria!");
		</script>           		
        <?php
        echo "<SCRIPT>window.close() </SCRIPT>";
}
?>

