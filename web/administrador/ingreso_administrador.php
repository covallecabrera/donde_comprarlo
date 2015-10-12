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
        <title>Administración - Donde Comprarlo</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="../default.css" rel="stylesheet" type="text/css" media="screen" />
        <script> 
        function abrir(){
            open('Popup.php', '', 'top=300,left=300,width=200,height=50');
        } 
        
        
        </script>
      
    </head>
    <body>
        <!-- start header -->
         <?php  
         if (($_POST['usuario'] == 'admin') && ($_POST['password'] == 12345)){
        ?>
            <script type="text/javascript">
             alert("Logueo Exitoso!");
         //    window.location.replace("ingreso_administrador.php");
            </script>
        <?php
            
         } else{
        ?>
            <script type="text/javascript">
             alert("Logueo Erroneo, intentelo de nuevo !");
            window.location.replace(document.referrer);
            </script>
        
        <?php
       //    echo "<SCRIPT>window.close();</SCRIPT>";

         }


         ?>

        <div id="header">
            <div id="logo">
                <h1>Donde</h1>
                <p>Comprarlo</p>
            </div>
            <div id="menu">
                <ul>
            <li class="current_page_item"><a href="ingreso_administrador.php">Inicio</a></li>
            <li><a href="../url.php">Ingresar URL</a></li>
            <li><a href="../Productos.php">Productos</a></li>
            <li><a href="../categoriaMarca.php">Agregar categoria o marca</a></li>
            <li><a href="../empresas.php">Empresas</a></li>

                </ul>
            </div>
        </div>
        <!-- end header -->
        <!-- start page -->
        <div id="page">
    <!-- start content -->
    <div id="content" style="margin-left:170px;">
        <div class="post greenbox">
            <div class="title">
                <h1>Sitio de Administrador de Donde Comprarlo</h1>
            </div>
            <div class="entry"> <img src="../images/img17.jpg" alt="" width="120" height="120" class="left" />
                <p> Bienvenido a la sección de administrador de Donde Comprarlo. Acá usted podrá agregar nuevas categorias, marcas o sitios para 
                 ser rastreados y agregados a la aplicación, asi como validar empresas y productos.</p>
            </div>
            <div class="btm">
                <div class="l">
                    <div class="r">
                        <p class="meta"><a href="#" class="more">Read More</a> &nbsp;&nbsp;&nbsp; <a href="#" class="comments">Comments (33)</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="two-columns">
            <div class="columnA">
                <div class="title red">
                    <h2>Links Cortos</h2>
                </div>
                <div class="content">
                    <ul>
                        <li><a href="../url.php">Ingresar URL</a></li>
                        <li><a href="../Productos.php">Productos</a></li>
                        <li><a href="../categoriaMarca.php">Agregar categoria o marca</a></li>
                        <li><a href="../empresas.php">Empresas</a></li>
                    </ul>
                </div>
            </div>
            <div class="columnB">
                <div class="title blue">
                    <h2>Gravida Orci</h2>
                </div>
                <div class="content">
                    <ul>
                        <li><a href="#">Aliquam libero</a></li>
                        <li><a href="#">Consectetuer adipiscing elit</a></li>
                        <li><a href="#">metus aliquam pellentesque</a></li>
                        <li><a href="#">Suspendisse iaculis mauris</a></li>
                        <li><a href="#">Urnanet non molestie semper</a></li>
                        <li><a href="#">Proin gravida orci porttitor</a></li>
                    </ul>
                </div>
            </div>
            <div class="btm">&nbsp;</div>
        </div>
    </div>
                </body>
                </html>
