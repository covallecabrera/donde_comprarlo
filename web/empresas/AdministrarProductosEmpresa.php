<?php
	
	require ('../db_conexion.php');

	$accion = $_GET['accion'];
	$id_producto = $_GET['id'];
	$rut_empresa = $_GET['rut_empresa'];
	if ($accion == "eliminar"){
		mysqli_query($con, "Delete from tienda_has_productos Where productos_id_productos='" . $id_producto . "' ");
		mysqli_query($con, "Delete from imagen Where productos_id_productos='" . $id_producto . "' ");
		mysqli_query($con, "Delete from productos Where id_productos='" . $id_producto . "' ");

		?>
			<script type="text/javascript">
 				// window.history.back();
 				alert("Su producto ha sido eliminado con exito");
 				window.location.replace(document.referrer);
			</script>
		<?php


	}elseif ($accion == "actualizar"){
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Balanced
Description: A two-column, fixed-width design suitable for blogs and small websites.
Version    : 1.0
Released   : 20090927

-->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Donde Comprarlo</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="../default.css" rel="stylesheet" type="text/css" media="screen" />

    </head>
    <body>

                <div id="header">
            <div id="logo">
                <h1>Donde</h1>
                <p>Comprarlo</p>
            </div>
            <div id="menu">
                <ul>
                        <li><a href="cuenta_empresa.php?rut_empresa=<?php echo $rut_empresa; ?>">Inicio</a></li>
                        <li><a href="ingreso_producto_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Agregar Productos</a></li>
                        <li class ="current_page_item"><a href="administrar_producto_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Administrar Productos</a></li>
                        <li><a href="modificar_cuenta_empresa.php?rut_empresa=<?php echo $rut_empresa ;?>">Modificar Cuenta</a></li>
                        <li><a href="../index.php">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
        <?php
        	$consulta_producto = mysqli_query($con,"select * from productos inner join tienda_has_productos 
        		on tienda_has_productos.productos_id_productos = productos.id_productos where id_productos = '" . $id_producto . "' ");
        	$resultado = mysqli_fetch_array($consulta_producto);
        	$nombre = $resultado['nombre_producto'];
        	$descripcion = $resultado['descripcion_producto'];
        	$precio = $resultado['precio_producto'];

        ?>

         <div id="page">
 
            <div id="content">
                <br>
                <div class="post greenbox">
                    <div class="title">
                        <h1>Actualizar Producto: <?php echo $nombre ?></h1>
                    </div>
        <form enctype="multipart/form-data" action="AdministrarProductosEmpresa.php" method="post" name="agregar">
            <table align="center">
                <p align="center"><input type="hidden" name="idUpdate" value="<?php echo $id_producto; ?>"  /></p>
                <p align="center">Nombre:<input type="text" name="nombreUpdate" value="<?php echo $nombre; ?>"  /></p>
                <p align="center">Descripcion:<textarea rows="10" col="20"name="descripcionUpdate"><?php echo $descripcion; ?></textarea></p>
                <p align="center">Precio:<input type="text" name="precioUpdate" value="<?php echo $precio; ?>" /></p>
                <p align="center"><input type="submit" value="Guardar Cambios" /></p>
            </table>                            
        </form>
    </div>
</div>
</div>
    </body>
</html>


		<?php
	}

	if(isset($_POST['idUpdate'])){
        $produId = htmlspecialchars($_POST['idUpdate']);
        $nombre = htmlspecialchars($_POST['nombreUpdate']);
        $descricion = htmlspecialchars($_POST['descripcionUpdate']);
        $precio = htmlspecialchars($_POST['precioUpdate']);
        validar_precio($precio);
        validacion_campos($nombre,$descricion,$precio);
        mysqli_query($con, "UPDATE productos SET nombre_producto='".$nombre."',descripcion_producto='".$descricion."' WHERE id_productos='".$produId."'");
        mysqli_query($con, "UPDATE tienda_has_productos SET precio_producto='".$precio."' WHERE productos_id_productos='".$produId."'");

        		?>
			<script type="text/javascript">
 				 // window.history.back();
 				alert("Producto Modificado con exito");
 				window.location.replace(document.referrer);

			</script>
		<?php
	}
    function validar_precio($precio){
    if(is_numeric($precio)){
        return true;
    }else{
                    ?>
                <script type="text/javascript">
                    alert("Precio debe ser solamente numeros.");
                    window.location.replace(document.referrer);
                </script>                   
                <?php
        return false;
    }
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



?>
