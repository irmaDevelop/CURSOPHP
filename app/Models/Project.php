<?php
namespace App\Models;

//require_once 'BaseElement.php';
require_once 'Printable.php';
use Illuminate\Database\Eloquent\Model;

class Project extends Model{
    protected $table = 'projects'; //la copio de la documentacion de eloquent


    public function getDurationAsString(){
		return '';
	}
}
