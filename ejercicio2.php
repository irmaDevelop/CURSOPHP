<?php
$lugares = [
    'Peru' =>[
        'Lima',
        'Trujillo',
        'Chiclayo'
    ],

    'Brasil' =>[
        'Sao Paulo',
        'Rio de Janeiro',
        'Porto Alegre'
    ],

    'Chile' =>[
        'Santiago de Chile',
        'Concepcion',
        'Iquique'
    ]
];


foreach($lugares as $pais => $ciudades){
    echo "$pais <br>";
    foreach($ciudades as $ciudad){
        echo "- $ciudad <br>";
    }
}

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

  <title>Ejercicios Arreglos - Ejercicio 2</title>
</head>

<body>
  <div class="container">
    <p>


    </p>
  </div>
</body>

</html>