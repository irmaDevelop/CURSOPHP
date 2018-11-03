<?php
namespace App\Controllers;
use App\Models\Project;

class ProjectsController extends BaseController{
    public function getProjectAddAction($request){

        //var_dump ($request->getMethod()); //DEVUELVE GET o POST 
        //https://www.php-fig.org/psr/psr-7/
        //var_dump ((string)$request->getBody()); 
         

        if ($request->getMethod() == 'POST'){
            $postData=$request->getParsedBody();
            $project = new Project();
            $project->title =  $postData['title'];
            $project->description = $postData['description'];
            $project->save();
        
        }

        //include '../views/addProject.php';
         return $this->renderHTML('addProject.twig');
        
    }
}


?>