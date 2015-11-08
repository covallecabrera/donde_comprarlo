<?php

require('../db_conexion.php');
require('../rutas.php');
$nombre_tienda = $_POST['nombre_tienda'];
// echo $nombre_tienda;
$url = $_POST['url'];
// echo $url;
$hora = $_POST['hora'];
// echo $hora;
$minuto = $_POST['minuto'];
// echo $minuto;
$horario = $hora.":".$minuto;
$automatizacion=$_POST['automatizacion'];
// echo $automatizacion;
$termino = $_POST['option1'];
$unico = $_POST['unico'];
// echo $termino;
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
// echo "Dia: ".$dia." Mes: ".$mes." Año: ".$ano;

$estado = "Activada";
$every = repeticion($automatizacion);
if($hora == "24"){
	$hora = "00";
}

if($unico == "unico"&&$termino=="termino"){
		?>
        <script type="text/javascript">
  				alert("No puede seleccionar evento único y fecha de termino al mismo tiempo");
  				window.history.back();
		</script>           		
        <?php
        exit();
}

if($unico=="unico"){
	$next = repeticion($unico);
	$respuesta = shell_exec("at ".$horario.$next.$dia." cmd /c start ".$ruta_redireccion_arana."redireccionArana.php?url=".$url); 
	$id = substr($respuesta, 52);
	mysqli_query($con,"INSERT INTO automatizacion_arana (nombre_sitio,url_rastreo,estado, horario, tipo, fecha_termino,id_at) VALUES ('".$nombre_tienda."','".$url."','".$estado."','".$horario."','".$unico."','".$ano."-".$mes."-".$dia."',".$id.")");
	// mysqli_query($con,"INSERT INTO automatizacion_arana (nombre_sitio,url_rastreo,estado, horario, tipo, fecha_termino) VALUES ('".$nombre_tienda."','".$url."','".$estado."','".$horario."','".$unico."','".$ano."-".$mes."-".$dia."')");
}
if ($termino == "termino"){
	// echo "at ".$horario." cmd start ".$ruta_redireccion_arana."?url=".$url;
	// schtasks /create /tn "Nombre Tarea, en este caso ID" /tr "ACCION A EJECUTAR cmd /c start ... " /sc "DAILY o lo que sea" /st 21:21
	$respuesta = shell_exec("at ".$horario.$every." cmd /c start ".$ruta_redireccion_arana."redireccionArana.php?url=".$url); 
	$id = substr($respuesta, 52);
	 mysqli_query($con,"INSERT INTO automatizacion_arana (nombre_sitio,url_rastreo,estado, horario, tipo, fecha_termino,id_at) VALUES ('".$nombre_tienda."','".$url."','".$estado."','".$horario."','".$automatizacion."','".$ano."-".$mes."-".$dia."',".$id.")");
	 // mysqli_query($con,"INSERT INTO automatizacion_arana (nombre_sitio,url_rastreo,estado, horario, tipo, fecha_termino) VALUES ('".$nombre_tienda."','".$url."','".$estado."','".$horario."','".$automatizacion."','".$ano."-".$mes."-".$dia."')");
}elseif ($termino != "termino"&&$unico!="unico") {
	$respuesta = shell_exec("at ".$horario.$every." cmd /c start ".$ruta_redireccion_arana."redireccionArana.php?url=".$url); 
	$id = substr($respuesta, 52);	
	 mysqli_query($con,"INSERT INTO automatizacion_arana (nombre_sitio,url_rastreo,estado, horario, tipo,id_at) VALUES ('".$nombre_tienda."','".$url."','".$estado."','".$horario."','".$automatizacion."',".$id.")");
	 // mysqli_query($con,"INSERT INTO automatizacion_arana (nombre_sitio,url_rastreo,estado, horario, tipo) VALUES ('".$nombre_tienda."','".$url."','".$estado."','".$horario."','".$automatizacion."')");
}
		?>
        <script type="text/javascript">
  				alert("Evento Programado con éxito");
	  			window.location.replace(document.referrer);
		</script>           		
        <?php

function repeticion($automatizacion){
	$repeticion=$automatizacion;

	if($repeticion=="diario"){
		$every = " /every:l,m,mi,j,v,s,d";
	}
	if($repeticion=="semanal"){
		$every = " /every:mi";
	}
	if($repeticion=="mensual"){
		$every = " /every:15";
	}
	if($repeticion=="anual"){

	}	
	if($repeticion=="unico"){
		$every = " /next:";
	}
	return $every;

}
function numeros_horas($numero) {
$no_permitidas= array ("1","2","3","4","5","6","7","8","9","0");
$permitidas= array ("01","02","03","04","05","06","07","08","O9","00");
$numero = str_replace($no_permitidas, $permitidas ,$numero);
return $numero;
}

?>
