<?php

require '';

class My2Test extends PHPUnit_Framework_TestCase{
 
    
public function testcategoria(){
$Categoria='';//INGRESAR CATEGORIA
 
$Array=jax($Categoria);//cambiar jax por la funcion
$Variable=0;
 
 
while(strtoupper($Categoria)==strtoupper($Array[$Variable])){
echo "PASSED PRUEBA 2";
$Variable+=1;
}else{
if(empty($Array[$Variable])==true){
echo "PASSED PRUEBA 2";	
}else{	
echo "FAILED PRUEBA 2";	 
}    
}     




}//END FUNCTION
}//END CLASS
?>