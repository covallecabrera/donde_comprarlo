<?php

require_once '../db_conexion.php';

        $sitio = strtolower($_POST['sitio']);
        $flag = 0;
        if($sitio != ''){

        
			      // move_uploaded_file($_FILES["script"]["tmp_name"],
			      // $target_path . $_FILES["script"];

				$target_path = "../arana/";
				$target_path = $target_path . basename( $_FILES['script']['name']); if(move_uploaded_file($_FILES['script']['tmp_name'], $target_path)) { echo "El archivo ". basename( $_FILES['script']['name']). " ha sido subido";
				} else{
					echo "Ha ocurrido un error, trate de nuevo!";
					?>
			        <script type="text/javascript">
			  				window.location.replace(document.referrer);
					</script>           		
			        <?php
				}

				 $consulta = mysqli_query($con, "SELECT * FROM sitio_soportado WHERE sitio_nombre = '".$sitio."'");
				 while ($row = mysqli_fetch_array($consulta)){
				 	$existencia = $row['sitio_nombre'];
				 	if ($existencia == $sitio){
		 				$flag = 1;
				 	}

				 }
				 if ($flag == 1){
				 		echo $asd = ("UPDATE sitio_soportado SET direccion_script = '".basename( $_FILES['script']['name'])."' WHERE sitio_nombre = '".$sitio."')");
 					     mysqli_query($con, "UPDATE sitio_soportado SET direccion_script = '".basename( $_FILES['script']['name'])."' WHERE sitio_nombre = '".$sitio."'");

				 		?>
				        <script type="text/javascript">
				  				alert("Script actualizado Correctamente!");
				  				window.location.replace(document.referrer);
						</script>           		
				        <?php		

				 }elseif ($flag == 0){
			     	mysqli_query($con, "INSERT INTO sitio_soportado (sitio_nombre,direccion_script) VALUES ('" . $sitio . "','".basename( $_FILES['script']['name'])."')");

			         ?>
			        <script type="text/javascript">
			  				alert("Sitio y Script Agregado Correctamente!");
			  				window.location.replace(document.referrer);
					</script>           		
			        <?php
				 }


	                   		
	        
        }else{
	        ?>
	        <script type="text/javascript">
	  				alert("Por favor, Ingrese nombre de sitio o tienda!");
	  				window.location.replace(document.referrer);
			</script>           		
	        <?php
	             		
	        
        }

?>