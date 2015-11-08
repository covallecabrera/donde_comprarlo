<?php
require('../db_conexion.php');
$accion = $_GET['accion'];
$id_automatizacion_arana = $_GET['id'];

$id_at = mysqli_query($con,"Select * from automatizacion_arana Where id_automatizacion_arana = ".$id_automatizacion_arana."");
$at = mysqli_fetch_array($id_at);
$at_id = $at['id_at'];

if($accion == "eliminar"){
	shell_exec("at ".$at_id." /delete /yes");	
	mysqli_query($con,"DELETE FROM automatizacion_arana WHERE id_automatizacion_arana = ".$id_automatizacion_arana."");
	
		?>
        <script type="text/javascript">
  				alert("Eliminado con éxito");
	  			window.location.replace(document.referrer);
		</script>           		
        <?php
}elseif($accion == "detener"){
	shell_exec("at ".$at_id." /delete /yes");		
	mysqli_query($con,"UPDATE  automatizacion_arana SET estado = 'Detenido' WHERE id_automatizacion_arana = ".$id_automatizacion_arana."");
			?>
        <script type="text/javascript">
  				alert("Modificado con éxito");
	  			window.location.replace(document.referrer);
		</script>           		
        <?php
}



?>