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
        return false;
}

function valida_no_existente_rut($rut,$con){

            $consulta_rut = ("Select * from empresa");
            
            $result = mysqli_query($con,$consulta_rut);

            while ($row = mysqli_fetch_array($result)) {
                if($rut==$row['rut_empresa']){
                    return true;
                }
            }

}


function valida_no_existente_correo($correo,$con){

            $consulta_correo = ("Select * from empresa");
            
            $result = mysqli_query($con,$consulta_correo);

            while ($row = mysqli_fetch_array($result)) {
                if($correo==$row['correo_empresa']){
                    return true;
                }
            }

}