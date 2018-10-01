<?php
class BaseElement{
    private $title;
    public $description;
    public $visible=true;
    public $months;

    public function __construct($title, $description){
        $this->setTitle($title);
        $this->description = $description;
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
}
