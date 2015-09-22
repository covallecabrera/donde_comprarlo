<?php


function valida_rut($rut)
{
    $rut = preg_replace('/[^k0-9]/i', '', $rut);
    $dv  = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut)-1);
    $i = 2;
    $suma = 0;
    foreach(array_reverse(str_split($numero)) as $v)
    {
        if($i==8)
            $i = 2;
        $suma += $v * $i;
        ++$i;
    }
    $dvr = 11 - ($suma % 11);
    
    if($dvr == 11)
        $dvr = 0;
    if($dvr == 10)
        $dvr = 'K';
    if($dvr == strtoupper($dv))
        return true;
    else
        ?>
            <script type="text/javascript">
                alert("Rut Ingresado Erroneo, por favor ingrese un Rut correctamente!");    
            </script>
            <?php
            echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
            exit;
}

function formato_rut( $rut ) { 
    return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
}

function valida_no_existente_rut($rut,$con){

            $consulta_rut = ("Select * from empresa");
            
            $result = mysqli_query($con,$consulta_rut);

            while ($row = mysqli_fetch_array($result)) {
                if($rut==$row['rut_empresa']){
                    ?>
            <script type="text/javascript">
                alert("Empresa ya ha sido registrada con anterioridad!");   
            </script>

            <?php
            echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
            exit;
                }
            }

}


function valida_no_existente_correo($correo,$con){

            $consulta_correo = ("Select * from empresa");
            
            $result = mysqli_query($con,$consulta_correo);

            while ($row = mysqli_fetch_array($result)) {
                if($correo==$row['correo_empresa']){
                                ?>
            <script type="text/javascript">
                alert("Correo ingresado ya ha sido utilizado con anterioridad!");   
            </script>

            <?php
            echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
            exit;
                }
            }

}

function valida_campos_vacios($correo,$direccion,$nombre,$rut){

    if($correo =="" || $direccion=="" || $nombre == "" || $rut == ""){
            ?>
            <script type="text/javascript">
              alert("Por favor rellene todos los campos!");
            </script>
            <?php
            echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
    }


}

function valida_campos_vacios_ingreso($rut,$contrasena){
    if($rut == ""||$contrasena == ""){
             ?>
            <script type="text/javascript">
              alert("Por favor rellene todos los campos!");
            </script>
            <?php
            echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
    }
}

function valida_correo_valido($correo){
    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    
            }else{
            ?>
            <script type="text/javascript">
                alert("Correo Ingresado Erroneo, por favor ingrese un correo válido!"); 
            </script>

            <?php
            echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
            exit;
            }
}

function valida_rut_existente($rut,$con){

            $consulta_rut = ("Select * from empresa");
            
            $result = mysqli_query($con,$consulta_rut);

            while ($row = mysqli_fetch_array($result)) {
                if($rut==$row['rut_empresa']){
                    $existe = true;        
                }

            }
            if($existe != true){
                ?>
            <script type="text/javascript">
                alert("Rut No Existe o no ha sido validado, por favor registrese o pongase en contacto con un administrador!");   
            </script>

            <?php
            echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
            }

}

function valida_contrasena_empresa($rut,$contrasena,$con){
          
            $consulta_empresa = ("Select * from empresa where rut_empresa = '".$rut."'");
             $result = mysqli_query($con,$consulta_empresa);

             while ($row = mysqli_fetch_array($result)) {
                $nombre_empresa = $row['nombre_empresa'];
                if($row['estado_empresa']=="Validada"){
                    if ($row['contrasena_empresa']==$contrasena){
                        ?>
                        <script type="text/javascript">
                         alert("Inicio de sesión Exitoso!");
                     //    window.location.replace("ingreso_administrador.php");
                        </script>
                    <?php
                    }else{
                         ?>
                        <script type="text/javascript">
                         alert("Contraseña Ingresada no es valida, intentelo de nuevo !");
                        window.close();
                        </script>
                         <?php
                    }
                }else{
                    ?>
                    <script type="text/javascript">
                    alert("Su empresa no ha sido validada en Donde Comprarlo, por favor espere validación o pongase en contacto con nosotros.");
                    window.close();
                    </script>
                    <?php

                }

             }

}