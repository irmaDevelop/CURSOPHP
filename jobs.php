<?php

use App\Models\{Job, Project};

$jobs = Job::all(); // un metodo mas sencillo de acceso para utilizar eloquent, trae todo lo que encuentre


  //$project1 = new Project('Project 1', 'Descripcion de Project 1');

  //$projects = [
  //  $project1
  //];

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

  function printElement($element){
    //contenido de la funcion
  
    //if ($element->visible == false){
    //  return;
    //}
  
    echo '<li class="work-position">';
    echo '<h5>' . $element->title . '</h5>';
    echo '<p>' . $element->description . '</p>';
    echo '<p>' . $element->getDurationAsString() . '</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>'; 
  }