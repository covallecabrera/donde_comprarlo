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
            <li><a href="categoriaMarca.php">Administrar Rastreador</a></li>
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
                    <h1 id="hola">Log Correos</h1>
                </div>
                <!-- Tabla que muestra los registros de la base de datos -->

        <?php require_once('db_conexion.php'); //importamos el archivo de conexión 
            $id_empresa = $_GET['id'];
        $result = mysqli_query($con,"select * FROM empresa 
                INNER JOIN log_correo_empresa ON empresa.id_empresa = log_correo_empresa.empresa_id_empresa
                where empresa.id_empresa = '".$id_empresa."' ");//Realizamos la seccion de todos los registros de empresa y sus imagenes.

                ?>

                <table align="center" width="500px" border="1" style="border-collapse:collapse;">
                    <tr>
                        <th>Nombre Empresa</th>
                        <th>Fecha Correo</th>
                        <th>Tipo Correo</th>
                        <th>Estado Correo</th>


                    </tr>

                    <?php 
                //Hacemos un ciclo en donde imprimimos cada registro de la tabla
                    while($row = mysqli_fetch_array($result)){              
                        ?>
                        <tr>            
                            <td><?php  echo $row['nombre_empresa'] ?></td>
                            <td><?php  echo $row['log_correo'] ?></td>
                            <td><?php  echo $row['tipo_correo'] ?></td>
                            <td><?php  echo $row['estado_correo'] ?></td>


                        </tr>
            <?php } //Fin del Ciclo
                mysqli_close($con);//cerramos la conexión
                ?>
            </table>

            <!-- Fin de la tabla -->

            <form>
                            
             <input type="button" value="Volver Atrás" name="volver atrás2" onclick="history.back()" />
                            
            </form>
                        
    </body>
</html>
