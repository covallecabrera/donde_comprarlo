<?php

require 'busqueda.php';

class MyTest extends PHPUnit_Framework_TestCase{
 
    
public function testbusqueda(){
$Busqueda='botin';//INGRESAR PALABRA A BUSCAR
 
$Array=jax($Busqueda);//cambiar jax por la funcion
$Variable=0;
 
 
while(strstr(strtoupper($Busqueda), strtoupper($Array[$Variable]))==true){

if(strstr(strtoupper($Busqueda), strtoupper($Array[$Variable]))==true){    
$Variable+=1;
}elseif(empty($Array[$Variable])==true){
echo "PASSED PRUEBA";
$this->assertEquals("a","a");
}else{
$this->assertEquals("a","b");    
echo "FAILED PRUEBA 1";	 
}    
}     




}//END FUNCTION
}//END CLASS
?>
