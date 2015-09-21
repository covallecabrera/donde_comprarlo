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
            <title>Cuenta Empresa - Donde Comprarlo</title>
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

             require('validaciones_empresas.php');


             $rut_empresa = $_POST['rut'];
             $contrasena_empresa = $_POST['contrasena'];
             $rut_empresa
             valida_campos_vacios_ingreso($rut_empresa,$contrasena_empresa);
             valida_rut($rut_empresa);
             valida_rut_existente($rut_empresa,$con);
             valida_contrasena_empresa($rut_empresa,$contrasena_empresa,$con);



             ?>

            <div id="header">
                <div id="logo">
                    <h1>Donde</h1>
                    <p>Comprarlo</p>
                </div>
                <div id="menu">
                    <ul>
                        <li class="current_page_item"><a href="cuenta_empresa.php">Inicio</a></li>
                        <li><a href="#">Agregar Productos</a></li>
                        <li><a href="#">Eliminar Productos</a></li>
                        <li><a href="#">Modificar Produtos</a></li>
                        <li><a href="#">Modificar Cuenta</a></li>

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
                    <h1>Sitio de Empresa de Donde Comprarlo</h1>
                </div>
                <div class="entry"> <img src="../images/img17.jpg" alt="" width="120" height="120" class="left" />
                    <p> Bienvenida empresa <?php echo $nombre_empresa ?>  a su cuenta de Donde Comprarlo. Acá usted podrá agregar agregar nuevos productos, 
                        eliminar productos o modificarlos, además podrá modificar datos de su cuenta.</p>
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
                            <li><a href="#">Agregar Productos</a></li>
                            <li><a href="#">Eliminar Productos</a></li>
                            <li><a href="#">Modificar Produtos</a></li>
                            <li><a href="#">Modificar Cuenta</a></li>
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
