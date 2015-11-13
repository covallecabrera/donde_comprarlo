<?php

require_once '../db_conexion.php';


if ($_POST["categoria"] !='') {

                        $categoria = htmlspecialchars($_POST['categoria']);
                        
                        mysqli_query($con, "INSERT INTO categoria (nombre_categoria) VALUES ('" . $categoria . "')");
      	?>
        <script type="text/javascript">
  				alert("Categoria Agregada Correctamente!");
          window.location.replace(document.referrer);
		</script>           		
        <?php
                        			
                        
          
}else{
	      	?>
        <script type="text/javascript">
  				alert("Por favor ingrese Categoria!");
          window.location.replace(document.referrer);
		</script>           		
        <?php
        
}
?>

