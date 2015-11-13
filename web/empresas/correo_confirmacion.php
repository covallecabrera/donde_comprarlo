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
        <!-- start header -->
         

        <div id="header">
            <div id="logo">
                <h1>Donde</h1>
                <p>Comprarlo</p>
            </div>
            <div id="menu">
                <ul>
                    <li><a href="../../index.php">Inicio</a></li>
                    <li class="current_page_item"><a href="#">Registro Empresa</a></li>
                    <li><a href="ingreso_empresa.php">Ingreso Empresa</a></li>
                    <li><a href="#">Contacto</a></li>
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
                        <h1>Registro Empresa</h1>
                    </div>
                    <div class="entry"> <img src="../images/url1.jpg" alt="" width="150" height="150" class="right" />
                        <h2><p align="center">Ingrese datos a continuación</p></h2>
                        <form enctype="multipart/form-data" action="envio_correo.php" method="post" name="ingreso" target="_blank">
                            <table align="center">
                            <p align="center">Nombre Empresa: <input type="text" placeholder="Ingrese nombre de su empresa"name="nombre"  /></p>
                            <p align="center">Rut Empresa: <input type="text" placeholder="12.123.123-2" name="rut"  /></p>
                            <p align="center">Dirección Empresa: <input type="text" placeholder="Tres Oriente 1331, Viña del Mar"name="direccion"  /></p>
                            <p align="center">Correo: <input type="text" placeholder="trabajo@ejemplo.cl" name="correo"  /></p>
                            <p align="center">Archivo: <input type="file" name="url"  /></p>
                            <p align="center">Adjunte cualquier archivo que sea válido para poder comprobar su empresa (Ej. Escáner Cedula Empresa) </p>
                            <p align="center"><input type="submit" value="Enviar Solicitud" /></p>
                            </table>                            
                        </form>


                        <br></br>

                    </div>

                </div>
                </body>
                </html>
