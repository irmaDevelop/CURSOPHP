<?php
namespace App\Controllers;
use App\Models\Project;

class ProjectsController{
    public function getProjectAddAction($request){

        //var_dump ($request->getMethod()); //DEVUELVE GET o POST 
        //https://www.php-fig.org/psr/psr-7/
        //var_dump ((string)$request->getBody()); 
         

        if ($request->getMethod() == 'POST'){
            $postData=$request->getParsedBody();
            $job = new Project();
            $job->title =  $postData['title'];
            $job->description = $postData['description'];
            $job->save();
        
        }


        include '../views/addProject.php';
    }
}


?>