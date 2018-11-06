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
<<<<<<< HEAD
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

=======
            $project = new Project();
            $project->title =  $postData['title'];
            $project->description = $postData['description'];
            $project->save();
>>>>>>> 43512edfaef6cead4293fc8a1e6958537450aeac
        
        }

        //include '../views/addProject.php';
<<<<<<< HEAD
         return $this->renderHTML('addProject.twig',[
            'responseMessage' => $responseMessage
        ]);
=======
         return $this->renderHTML('addProject.twig');
        
>>>>>>> 43512edfaef6cead4293fc8a1e6958537450aeac
    }
}


?>