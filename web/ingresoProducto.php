<?php
		

require_once 'db_conexion.php';
		$nombre = $_POST["nombre"];
        $subcategoria = $_POST['id_sub_categoria'];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $marca = $_POST["id_marca"];
        $tienda = $_POST["id_tienda"];

        if ($nombre == '' || $descripcion == '' || $precio == ''){
        	?>
        <script type="text/javascript">
  				alert("Por favor, rellene todos los campos!");
		</script>           		
        <?php
                        			
        echo "<SCRIPT>window.close() </SCRIPT>";
        }
        if (count($_FILES["upload"]["name"]) > 6){
        	?>
		        <script type="text/javascript">
		  			alert("No puede Seleccionar más de 6 imagenes");
				</script>           		
		        <?php
		                        			
		        echo "<SCRIPT>window.close() </SCRIPT>";
		        
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
		}
        mysqli_query($con, "INSERT INTO productos (nombre_producto,descripcion_producto,marca_id_marca,sub_categoria_id_sub_categoria) VALUES ('" . $nombre . "','".$descripcion."',".$marca.",".$subcategoria.")");

      	$result=mysqli_query($con, "Select * from productos where nombre_producto = '".$nombre."'");

      	while($row = mysqli_fetch_array($result)){
      		$id_producto = $row["id_productos"];
      	}

      	mysqli_query($con, "INSERT INTO tienda_has_productos (tienda_id_tienda,productos_id_productos,precio_producto) VALUES (" . $tienda . ",".$id_producto.",".$precio.")");


        $target_path = "../fotos/";
        $ruta = "http://localhost/donde_comprarlo/fotos/";

		for($i=0;$i<count($_FILES["upload"]["name"]);$i++) 
		{
		if (file_exists($target_path . $_FILES["upload"]["name"][$i]))
		      {
		      	?>
			        <script type="text/javascript">
			  				alert("Imagen : <?php echo $_FILES["upload"]["name"][$i]; ?> ya existe y no ha sido agregada");
					</script>           		
		        <?php
		    
		      }
		    else
		      {

		      move_uploaded_file($_FILES["upload"]["tmp_name"][$i],
		      $target_path . $_FILES["upload"]["name"][$i]);
		      echo "Stored in: " . $target_path . $_FILES["upload"]["name"][$i];
		      mysqli_query($con, "INSERT INTO imagen (url_imagen,productos_id_productos) VALUES ('".$ruta.$_FILES["upload"]["name"][$i] ."','".$id_producto."')");
		      

		      }
		}
         

      	?>
        <script type="text/javascript">
  				alert("Producto Agregado Correctamente!");
		</script>           		
        <?php
                        			
         echo "<SCRIPT>window.close() </SCRIPT>"; 

?>