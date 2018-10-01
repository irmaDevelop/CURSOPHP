<?php
$arreglo = [

	‘keyStr1’ => ‘lado’,
	0 => ‘ledo’,

	‘keyStr2’ => ‘lido’,
	1 => ‘lodo’,
	2 => ‘ludo’
];

$arreglo_inv = array_reverse($arreglo);
var_dump ($arreglo);
var_dump ($arreglo_inv);
/*
Lado, ledo, lido, lodo, ludo,
decirlo al revés lo dudo.
Ludo, lodo, lido, ledo, lado,
¡Qué trabajo me ha costado!
*/
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

  <title>Ejercicios Arreglos - Ejercicio 1</title>
</head>

<body>
  <div class="container">
    <p>
      <?php print($arreglo[‘keyStr1’] . $arreglo[0]. ', '.$arreglo[‘keyStr2’].', ' . $arreglo[1]. ', '.$arreglo[2]. ', ');?> <br>
      Decirlo al revez lo dudo. <br>
      <?php echo $arreglo[2] . ', '. $arreglo[1]. ', '.$arreglo[‘keyStr2’].', ' . $arreglo[0]. ', '.$arreglo[‘keyStr1’];?> <br>
      ¡Qué trabajo me ha costado! <br>
    </p>
  </div>
</body>

</html>