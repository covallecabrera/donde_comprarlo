<?php
		

require_once 'db_conexion.php';
require 'rutas.php';
		$nombre = $_POST["nombre"];
        $subcategoria = $_POST['id_sub_categoria'];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $marca = $_POST["id_marca"];
        $tienda = $_POST["id_tienda"];
        $cdad_imagenes = count($_FILES["upload"]["name"]);

        $campos = validacion_campos($nombre,$descripcion,$precio);
        $cdad = validar_cdad_imagenes($cdad_imagenes);

      	if ($campos == true && $cdad == true){
        mysqli_query($con, "INSERT INTO productos (nombre_producto,descripcion_producto,marca_id_marca,sub_categoria_id_sub_categoria,estado_producto) VALUES ('" . $nombre . "','".$descripcion."',".$marca.",".$subcategoria.",1)");

      	$result=mysqli_query($con, "Select * from productos where nombre_producto = '".$nombre."'");

      	while($row = mysqli_fetch_array($result)){
      		$id_producto = $row["id_productos"];
      	}

      	mysqli_query($con, "INSERT INTO tienda_has_productos (tienda_id_tienda,productos_id_productos,precio_producto) VALUES (" . $tienda . ",".$id_producto.",".$precio.")");


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

		      // Consulta de imagenes ordenadas de forma descendente, para otmar el ultimo id de la imagen
		      $result2 = mysqli_query($con,"Select id_imagen from imagen order by id_imagen DESC");
		      // TOmo el ultimo valor de las ID's
		      $row = mysqli_fetch_array($result2);
		      $id_imagen[$i]=$row["id_imagen"];
		      // Le sumo uno, ya que la proxima imagen vendra con ese ID
		      $id_imagen[$i]=$id_imagen[$i]+1;
		      // Recupero la extencion del archivo subido
		      $extension = $_FILES["upload"]["type"][$i];
		      // La extencion se entrega images/jpeg o png o lo que sea, lo que se hace aca es sacarle el images y ponerle el punto
		      $extension = ".".substr($extension,6);
		      // Se almacenan las imagenes subidas en el servidor
		      move_uploaded_file($_FILES["upload"]["tmp_name"][$i],
		      $target_path .$id_imagen[$i].$extension);
		      // Se insertan en la BDD la imagen 
		      mysqli_query($con, "INSERT INTO imagen (url_imagen,productos_id_productos) VALUES ('".$ruta.$id_imagen[$i].$extension ."','".$id_producto."')");
			      

		      }
		}
		?>
        <script type="text/javascript">
  				alert("Producto Agregado Correctamente!");
  				window.location.replace(document.referrer);
		</script>           		
        <?php

		}


function validacion_campos($nombre,$descripcion,$precio){
        if ($nombre == '' || $descripcion == '' || $precio == ''){
        	?>
        <script type="text/javascript">
  				alert("Por favor, rellene todos los campos!");
  				window.location.replace(document.referrer);
		</script>           		
        <?php
		                        			
        	return false;

        }
        return true;
}

function validar_cdad_imagenes($cdad_imagenes){
		if ($cdad_imagenes > 6){
        	?>
		        <script type="text/javascript">
		  			alert("No puede Seleccionar más de 6 imagenes");
		  			window.location.replace(document.referrer);
				</script>           		
		        <?php
		    return false;
		}
		return true;
}
   

?>