<?php

require_once 'db_conexion.php';


if ($_POST["marca"] != '') {
    

     $marca = $_POST['marca'];

         mysqli_query($con, "INSERT INTO marca (nombre_marca) VALUES ('" . $marca . "')");
              
        // return(true);    
         ?>
        <script type="text/javascript">
  				alert("Marca Agregada Correctamente");
          window.location.replace(document.referrer);
		</script>           		
        <?php
                 

}else{
      	?>
        <script type="text/javascript">
  				alert("Por favor, ingrese nombre de marca");
          window.location.replace(document.referrer);
		</script>           		
        <?php
        
}
?>