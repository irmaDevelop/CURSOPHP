<?php
namespace App\Models;
require_once 'BaseElement.php';
require_once 'Printable.php';

class Job extends BaseElement { 

    public function __construct($title, $description){
        //con la funcion en blanco los datos de Title y description no se muestran
        //pero si agregamos la palabra reservada PARENT e ingresamos los parametros si se muestran
        $newTitle = 'Job: ' . $title;
        //parent::__construct($newTitle, $description);
        $this->title = $newTitle; //solo si title es de Tipo PROTECTED  
    }

    public function getDurationAsString(){
        $years = floor($this->months/12);
        $extraMonths = $this->months % 12;
        
        $salida="";
        if ($years!=0){
          $salida = "$years years";
        }
        if ($extraMonths!=0){
          $salida="$salida $extraMonths months";
        }
        return "Job duration: $salida";
    }

}