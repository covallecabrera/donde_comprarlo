<?php

require_once 'db_conexion.php';

        $sitio = $_POST['sitio'];
		//$target_path = "";
        if($sitio != ''){

        
			      // move_uploaded_file($_FILES["script"]["tmp_name"],
			      // $target_path . $_FILES["script"];

				$target_path = "";
				$target_path = $target_path . basename( $_FILES['script']['name']); if(move_uploaded_file($_FILES['script']['tmp_name'], $target_path)) { echo "El archivo ". basename( $_FILES['script']['name']). " ha sido subido";
				} else{
					echo "Ha ocurrido un error, trate de nuevo!";
				}
			     mysqli_query($con, "INSERT INTO sitio_soportado (sitio_nombre,direccion_script) VALUES ('" . $sitio . "','".basename( $_FILES['script']['name'])."')");

	         ?>
	        <script type="text/javascript">
	  				alert("Sitio y Script Agregado Correctamente!");
			</script>           		
	        <?php
	                   		
	        echo "<SCRIPT>window.close() </SCRIPT>";
        }else{
	        ?>
	        <script type="text/javascript">
	  				alert("Por favor, Ingrese nombre de sitio o tienda!");
			</script>           		
	        <?php
	                   		
	        echo "<SCRIPT>window.close() </SCRIPT>";
        }

?>