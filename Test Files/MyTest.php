<?php

require_once '/Applications/MAMP/htdocs/donde_comprarlo/busqueda.php';
require_once '/Applications/MAMP/htdocs/donde_comprarlo/busqueda_criterios.php';


class MyTest extends PHPUnit_Framework_TestCase{
 
 
public function testbusqueda(){
$Busqueda="@@@@";//INGRESAR PALABRA A BUSCAR

$this->assertContains(strtoupper($Busqueda), strtoupper(busqueda($Busqueda))); 
}//END FUNCTION

public function testbusqueda2(){
$Busqueda2="PUma";//INGRESAR PALABRA A BUSCAR
  
$this->assertContains(strtoupper($Busqueda2), strtoupper(busqueda($Busqueda2))); 

}//END FUNCTION


public function testbusqueda3(){
$Busqueda3="Super Candelabro";//INGRESAR PALABRA A BUSCAR
  
$this->assertContains(strtoupper($Busqueda3), strtoupper(busqueda($Busqueda3))); 

}//END FUNCTION


public function testbusqueda4(){
$Busqueda4="puma";//INGRESAR PALABRA A BUSCAR
  
$this->assertContains(strtoupper($Busqueda4), strtoupper(busqueda($Busqueda4))); 

}//END FUNCTION

public function testbusqueda5(){
$Busqueda5="2626";//INGRESAR PALABRA A BUSCAR
  
$this->assertContains(strtoupper($Busqueda5), strtoupper(busqueda($Busqueda5))); 

}//END FUNCTION

public function testcriterio(){
$Busquedacri="";//INGRESAR PALABRA A BUSCAR
$categoria="" ;
$marca="";
$preciomax="";
if($categoria=="botin"){
    $idcat='2';
}  elseif ($categoria=="bota") {
    $idcat='1';
}else{
    $idcat='0';
}
if($marca=="azaleia"){
    $idma='1';
}elseif ($marca=="16 hrs") {
            $idma='2';
        }elseif ($marca=="gacel") {
            $idma='3';
        }elseif ($marca=="naturalizer") {
            $idma='4';
        }elseif ($marca=="pollini") {
            $idma='5';
        }else{
            $idma='0';
        }
if($preciomax==''){
   if($Busquedacri!='' or $idcat!='0'){
     $preciomax='999999';  
}else{
 $preciomax='0';   
} 
}
if($Busquedacri==''){
    $re='_';
}else{
    $re=$Busquedacri;
}
$this->assertContains(strtoupper($re), strtoupper(criterios($Busquedacri,$idcat,$idma,$preciomax))); 
}//END FUNCTION

public function testcriterio2(){
$Busquedacri="puma";//INGRESAR PALABRA A BUSCAR
$categoria="botin" ;
$marca="gacel";
$preciomax="asdf";
if($categoria=="botin"){
    $idcat='2';
}  elseif ($categoria=="bota") {
    $idcat='1';
}else{
    $idcat='0';
}
if($marca=="azaleia"){
    $idma='1';
}elseif ($marca=="16 hrs") {
            $idma='2';
        }elseif ($marca=="gacel") {
            $idma='3';
        }elseif ($marca=="naturalizer") {
            $idma='4';
        }elseif ($marca=="pollini") {
            $idma='5';
        }else{
            $idma='0';
        }
if($preciomax==''){
   if($Busquedacri!='' or $idcat!='0'){
     $preciomax='999999';  
}else{
 $preciomax='0';   
}

}else{
    $preciomax='0';
}
if($Busquedacri==''){
    $re='_';
}else{
    $re=$Busquedacri;
}
$this->assertContains(strtoupper($re), strtoupper(criterios($Busquedacri,$idcat,$idma,$preciomax))); 
}//END FUNCTION

public function testcriterio3(){
$Busquedacri="puma";//INGRESAR PALABRA A BUSCAR
$categoria="botin" ;
$marca="gacel";
$preciomax="@@@@";
if($categoria=="botin"){
    $idcat='2';
}  elseif ($categoria=="bota") {
    $idcat='1';
}else{
    $idcat='0';
}
if($marca=="azaleia"){
    $idma='1';
}elseif ($marca=="16 hrs") {
            $idma='2';
        }elseif ($marca=="gacel") {
            $idma='3';
        }elseif ($marca=="naturalizer") {
            $idma='4';
        }elseif ($marca=="pollini") {
            $idma='5';
        }else{
            $idma='0';
        }
if($preciomax==''){
   if($Busquedacri!='' or $idcat!='0'){
     $preciomax='999999';  
}else{
 $preciomax='0';   
}

}else{
    $preciomax='0';
}
if($Busquedacri==''){
    $re='_';
}else{
    $re=$Busquedacri;
}
$this->assertContains(strtoupper($re), strtoupper(criterios($Busquedacri,$idcat,$idma,$preciomax))); 
}


public function testcriterio4(){
$Busquedacri="puma";
$categoria="botin" ;
$marca="gacel";
$preciomax="-2900";
if($categoria=="botin"){
    $idcat='2';
}  elseif ($categoria=="bota") {
    $idcat='1';
}else{
    $idcat='0';
}
if($marca=="azaleia"){
    $idma='1';
}elseif ($marca=="16 hrs") {
            $idma='2';
        }elseif ($marca=="gacel") {
            $idma='3';
        }elseif ($marca=="naturalizer") {
            $idma='4';
        }elseif ($marca=="pollini") {
            $idma='5';
        }else{
            $idma='0';
        }
if($preciomax==''){
   if($Busquedacri!='' or $idcat!='0'){
     $preciomax='999999';  
}else{
 $preciomax='0';   
}

}
if($Busquedacri==''){
    $re='_';
}else{
    $re=$Busquedacri;
}
$this->assertContains(strtoupper($re), strtoupper(criterios($Busquedacri,$idcat,$idma,$preciomax))); 
}//END FUNCTION







}//END CLASS
?>
