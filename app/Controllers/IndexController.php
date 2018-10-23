<?php
namespace App\Controllers;
use App\Models\{Job, Project};

class IndexController{
    public function indexAction(){
        $jobs = Job::all(); // un metodo mas sencillo de acceso para utilizar eloquent, trae todo lo que encuentre
        $projects = Project::all();

        $name = 'Irma Davila';
        $limitMonths = 200;

        include '../views/index.php';
    }
}

?>