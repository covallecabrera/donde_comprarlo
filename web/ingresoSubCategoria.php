<?php

require_once 'db_conexion.php';


        $subcategoria = $_POST['subcategoria'];
        $idcategoria = $_POST['idcategoria'];
        if($subcategoria != ''){
	        mysqli_query($con, "INSERT INTO sub_categoria (nombre_sub_categoria,categoria_id_categoria) VALUES ('" . $subcategoria . "','".$idcategoria."')");

	         ?>
	        <script type="text/javascript">
	  				alert("Sub-Categoria agregada correctamente!");
	  				window.location.replace(document.referrer);
			</script>           		
	        <?php
	                   		
	        
        }else{
	        ?>
	        <script type="text/javascript">
	  				alert("Por favor, rellene campo de Sub-Categoria!");
	  				window.location.replace(document.referrer);
			</script>           		
	        <?php
	                   		
	       
        }

?>