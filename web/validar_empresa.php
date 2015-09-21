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
    <link href="default.css" rel="stylesheet" type="text/css" media="screen" />
    <script> 
    function abrir(){
        open('Popup.php', '', 'top=300,left=300,width=200,height=50');
    } 


    </script>

</head>
<body>
    <!-- start header -->


    <div id="header">
        <div id="logo">
            <h1>Donde</h1>
            <p>Comprarlo</p>
        </div>
        <div id="menu">
            <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="url.php">Ingresar URL</a></li>
            <li><a href="Productos.php">Productos</a></li>
            <li><a href="categoriaMarca.php">Agregar categoria o marca</a></li>
            <li class="current_page_item"><a href="empresas.php">Empresas</a></li>

            </ul>
        </div>
    </div>
    <!-- end header -->

    <!-- start page -->
    <div id="page">
        <!-- start content -->
        <div id="content">
            <div class="post greenbox">
                <div class="title">
                    <h1 id="hola">Validacion Empresa</h1>
                </div>
                <!-- Tabla que muestra los registros de la base de datos -->

        <?php require_once('db_conexion.php'); //importamos el archivo de conexión 
        $result = mysqli_query($con,"select * FROM empresa 
                INNER JOIN imagen_empresa_validacion ON empresa.id_empresa = imagen_empresa_validacion.empresa_id_empresa
                where estado_empresa = 'Pendiente' or estado_empresa = 'Rechazada' ");//Realizamos la seccion de todos los registros de empresa y sus imagenes.

                ?>

                <table align="center" width="500px" border="1" style="border-collapse:collapse;">
                    <tr>
                        <th>Nombre</th>
                        <th>Rut</th>
                        <th>Direccion</th>
                        <th>Correo</th>
                        <th>Estado Validación</th>
                        <th> Foto </th>
                        <th> Validar </th>
                        <th> Rechazar </th>


                    </tr>

                    <?php 
                //Hacemos un ciclo en donde imprimimos cada registro de la tabla
                    while($row = mysqli_fetch_array($result)){              
                        ?>
                        <tr>            
                            <td><?php  echo $row['nombre_empresa'] ?></td>
                            <td><?php  echo $row['rut_empresa'] ?></td>
                            <td><?php  echo $row['direccion_empresa'] ?></td>
                            <td><?php  echo $row['correo_empresa'] ?></td>
                            <td><?php  echo $row['estado_empresa'] ?></td>
                            <td><a href="ver_imagen_empresa.php?id=<?php echo $row['id_imagen'] ?>">Ver</a></td> 
                            <td><a href="cambiar_estado_empresa.php?id=<?php echo $row['id_empresa'].'&'."validacion=valida" ?>">Validar Empresa</a></td> 
                            <td><a href="cambiar_estado_empresa.php?id=<?php echo $row['id_empresa'].'&'."validacion=no_valida" ?>">Rechazar Empresa</a></td> 


                        </tr>
            <?php } //Fin del Ciclo
                mysqli_close($con);//cerramos la conexión
                ?>
            </table>


            <!-- Fin de la tabla -->

<!--
    <script type="text/javascript">
        
        function hola(){
            alert("EMpresasadasd ");
           var X =  document.getelementbyid("el id va aca").value();
        }

        function cambiar_estado(){
            var xmlhttp = new XMLHttpRequest();
            var url = "php/verActualizarAlertas.php";

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            myFunction(xmlhttp.responseText);
        }
    }
    xmlhttp.open("GET", url, true);
    xmlhttp.send();

    function myFunction(response) {
        console.log(response);

        var arr = JSON.parse(response);
        var i;
    
        for(i = 0; i < arr.length; i++) {
            console.log(arr[i].nombre_alerta);
            console.log(arr[i].sensor);
            console.log(arr[i].signo);
            console.log(arr[i].valor);
            console.log(arr[i].estado);
            var estado;
            if (arr[i].estado == 1){
                estado = "Activada";
            }else{
                estado = "Desactivada";
            }
            var sensor;
            if (arr[i].sensor == 1){
                sensor = "Temperatura";
            }
            else if(arr[i].sensor == 2){
                sensor = "Humedad";
            }
            else if(arr[i].sensor == 3){
                sensor = "Gas";
            }



            out += "<li class='collection-item avatar'><i class='mdi-action-assessment circle green'></i><span class='title'>"+arr[i].nombre_alerta+"</span><p>"+sensor+" "+arr[i].signo+" "+arr[i].valor+"<br>"+estado+"</p><a href='#!' class='secondary-content'><i class='mdi-action-grade'></i></a></li>";
            //lista
        }
        }
        $("#lista").prepend(out);
    }
    </script>
-->

</body>
</html>
