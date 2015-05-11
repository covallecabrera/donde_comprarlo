<?php

require '';

class My3Test extends PHPUnit_Framework_TestCase{
 
    
public function testbusquedaavanzada(){
$Busqueda='';//INGRESAR PALABRA A BUSCAR
$Categoria='';//INGRESAR CATEGORIA A BUSCAR
$Marca1='';//INGRESAR MARCAS
$Rango='';//INGRESAR RANGO
$Preciomax='';//INGRESAR PRECIO MAXIMO

 
$Array=jax($Busqueda,$Categoria,$Marca1,$Rango,$Preciomax);//cambiar jax por la funcion
$Variable=0;
 
 
while($Rango>=strtoupper($Array->$Rango[$Variable])){

echo "PASSED PRUEBA 1";
$Variable+=1;
else{
if(empty($Array[$Variable])==true){
echo "PASSED PRUEBA 1";	
}else{	
echo "FAILED PRUEBA 1";	 
}    
}     




}//END FUNCTION
}//END CLASS
?>