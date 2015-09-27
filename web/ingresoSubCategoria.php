<?php

require_once 'db_conexion.php';
require_once 'db_conexion2.php';


        $subcategoria = $_POST['subcategoria'];
        $idcategoria = $_POST['idcategoria'];
        if($subcategoria != ''){
	        mysqli_query($con, "INSERT INTO sub_categoria (nombre_sub_categoria,categoria_id_categoria) VALUES ('" . $subcategoria . "','".$idcategoria."')");
	        mysqli_query($con2, "INSERT INTO sub_categoria (nombre_sub_categoria,categoria_id_categoria) VALUES ('" . $subcategoria . "','".$idcategoria."')");

	         ?>
	        <script type="text/javascript">
	  				alert("Sub-Categoria agregada correctamente!");
			</script>           		
	        <?php
	                   		
	        echo "<SCRIPT>window.close() </SCRIPT>";
        }else{
	        ?>
	        <script type="text/javascript">
	  				alert("Por favor, rellene campo de Sub-Categoria!");
			</script>           		
	        <?php
	                   		
	        echo "<SCRIPT>window.close() </SCRIPT>";
        }

?>