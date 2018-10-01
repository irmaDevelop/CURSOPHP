<?php
require_once 'app/Models/Job.php';
require_once 'app/Models/Project.php';
require_once 'app/Models/Printable.php';

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

$project1 = new Project('Project 1', 'Descripcion de Project 1');


//

$jobs = [
    $job1,
    $job2,
    $job3
  ];

  $projects = [
    $project1
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

  function printElement(Printable $element){
    //contenido de la funcion
  
    if ($element->visible == false){
      return;
    }
  
    echo '<li class="work-position">';
    echo '<h5>' . $element->getTitle() . '</h5>';
    echo '<p>' . $element->getDescription() . '</p>';
    //echo '<p>' . getDuration($job->months) . '</p>';
    echo '<p>' . $element->getDurationAsString() . '</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>'; 
  }