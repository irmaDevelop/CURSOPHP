<?php
$valores = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61];
asort($valores);
$cuenta=0;

foreach($valores as $valor){
    if ($cuenta<3 || $cuenta>11){
        echo "$valor , <br>";
    }
    $cuenta++;
}
?>