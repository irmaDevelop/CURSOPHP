<?php
namespace App\Controllers;
use App\Models\Project;
use Respect\Validation\Validator as v;

class ProjectsController extends BaseController{
    public function getProjectAddAction($request){

        //var_dump ($request->getMethod()); //DEVUELVE GET o POST 
        //https://www.php-fig.org/psr/psr-7/
        //var_dump ((string)$request->getBody()); 
         
        $responseMessage = null;

        if ($request->getMethod() == 'POST'){
            $postData=$request->getParsedBody();
            $projectValidator = v::key('title', v::stringType()->notEmpty())
                    ->key('description', v::stringType()->notEmpty());

            try{
                //$projectValidator->validate($postData); //solo devuelve true o false.
                $projectValidator->assert($postData); //valida similar a validate pero devuelve datos
                $project = new Project();
                $project->title =  $postData['title'];
                $project->description = $postData['description'];
                $project->save();
                $responseMessage = "saved";

            }catch(\Exception $e){
                $responseMessage=$e->getMessage();
            }

        
        }

        //include '../views/addProject.php';
         return $this->renderHTML('addProject.twig',[
            'responseMessage' => $responseMessage
        ]);
    }
}


?>