<?php
namespace App\Controllers;
use App\Models\{Job, Project};

class IndexController extends BaseController{
    public function indexAction(){
        $jobs = Job::all(); // un metodo mas sencillo de acceso para utilizar eloquent, trae todo lo que encuentre
        $projects = Project::all();

        $name = 'Irma Davila';
        $limitMonths = 200;
        //cuando usamos renderHTML lo que queremos es tener una respuesta HTML
        return $this->renderHTML('index.twig',[
            'name' => $name,
            'jobs' => $jobs,
            'projects' => $projects
        ]);
    }
}

?>