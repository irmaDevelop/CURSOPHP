<?php
//ejercicio 1
//Calcula el resultado de 32+3 y 3(2+3). Escribe el procedimiento que empleaste en la sección de discusiones.
echo '<h1>Ejercicio 1 </h1><br>';
echo 32+3 . '<br>';
echo 3*(2+3);

//ejercicio 2

echo '<br><br><h1>Ejercicio 2 </h1> <br>';
$valor = '10';
if($valor > 5 and $valor < 10){
    echo $valor . ' es mayor que 5 pero menor que 10 <br>';
}
 
if($valor >= 0 and $valor <= 20){
    echo $valor . ' es mayor o igual a 0 pero menor o igual a 20 <br>';
}

if($valor === '10'){
    echo $valor . ' es igual a “10” asegurando que el tipo de dato sea cadena<br>';
}

if(($valor > 0 && $valor<5) || ($valor > 10 && $valor<15)){
    echo $valor . 'es mayor a 0 pero menor a 5 o es mayor a 10 pero menor a 15<br>';
}
?>