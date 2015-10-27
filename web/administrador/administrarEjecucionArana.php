<?php
require('../db_conexion.php');
$accion = $_GET['accion'];
$id_automatizacion_arana = $_GET['id'];

if($accion == "eliminar"){
	shell_exec("at ".$id_automatizacion_arana." /delete /yes");	
	mysqli_query($con,"DELETE FROM automatizacion_arana WHERE id_automatizacion_arana = ".$id_automatizacion_arana."");
	
		?>
        <script type="text/javascript">
  				alert("Eliminado con éxito");
	  			window.location.replace(document.referrer);
		</script>           		
        <?php
}elseif($accion == "detener"){
	shell_exec("at ".$id_automatizacion_arana." /delete /yes");		
	mysqli_query($con,"UPDATE  automatizacion_arana SET estado = 'Detenido' WHERE id_automatizacion_arana = ".$id_automatizacion_arana."");
			?>
        <script type="text/javascript">
  				alert("Modificado con éxito");
	  			window.location.replace(document.referrer);
		</script>           		
        <?php
}



?>