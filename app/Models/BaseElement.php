<?php
namespace App\Models;
require_once 'Printable.php';


class BaseElement implements Printable{
    protected $title;
    public $description;
    public $ruta;
    public $visible=true;
    public $months;

    public function __construct($title, $description,$ruta){
        $this->setTitle($title);
        $this->description = $description;
        $this->logo = $ruta;
    }


    public function setTitle($title){
        if ($title ==''){
            $this->title = 'N/A';
        }else{
            $this->title = $title;
        }
    }

    public function getTitle(){
        return $this->title;
    
        
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
        return $salida;
    }


    public function getDescription(){
        return $this->description;
    }
}
