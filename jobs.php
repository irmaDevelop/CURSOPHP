<?php
require 'app/Models/Job.php';

$job1 = new Job('PHP Developer','This is an awsome job!!!');
//$job1 -> setTitle('PHP Developer');
//$job1 -> description = 'This is an awsome job!!!';
//$job1 -> visible = true;
$job1 -> months = 16;

$job2 = new Job('Python Dev','The teacher was pretty good');
//$job2 -> setTitle('Python Dev');
//$job2 -> description = 'The teacher was pretty good';
//$job2 -> visible = true;
$job2 -> months = 24;

$job3 = new Job('','It was too dificult and hard, but I finaly finished it');
//$job3 -> setTitle('');
//$job3 -> description = 'It was too dificult and hard, but I finaly finished it';
//$job3 -> visible = true;
$job3 -> months = 32;

//

$jobs = [
    $job1,
    $job2,
    $job3
    // [
    //   'title' => 'PHP Developer',
    //   'description' => 'This is an awsome job!!!',
    //   'visible' => true,
    //   'months' => 16
    // ],
    // [
    //   'title' => 'Python Dev',
    //   'description' => 'The teacher was pretty good',
    //   'visible' => false,
    //   'months' => 14
    // ],
    // [
    //   'title' => 'Devops',
    //   'description' => 'It was too dificult and hard, but I finaly finished it',
    //   'visible' => true,
    //   'months' => 5
    // ],
  
    // [
    //   'title' => 'Node Dev',
    //   'description' => 'It was too dificult and hard, but I finaly finished it',
    //   'visible' => true,
    //   'months' => 24
    // ],
  
    // [
    //   'title' => 'Frontend Dev',
    //   'description' => 'It was too dificult and hard, but I finaly finished it',
    //   'visible' => true,
    //   'months' => 3
    // ]
  ];

/*  //Funcion reemplazada por metodo getDurationAsString de la clase Job
function getDuration($months){
    $years = floor($months/12);
    $extraMonths = $months % 12;
    
    $salida="";
    if ($years!=0){
      $salida = "$years years";
    }
    if ($extraMonths!=0){
      $salida="$salida $extraMonths months";
    }
    return $salida;
}
*/

  function printJob($job){
    //contenido de la funcion
  
    if ($job->visible == false){
      return;
    }
  
    echo '<li class="work-position">';
    echo '<h5>' . $job->getTitle() . '</h5>';
    echo '<p>' . $job->description . '</p>';
    //echo '<p>' . getDuration($job->months) . '</p>';
    echo '<p>' . $job->getDurationAsString() . '</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>'; 
  }