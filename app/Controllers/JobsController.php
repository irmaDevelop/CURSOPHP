<?php
namespace App\Controllers;
use App\Models\Job;
use Respect\Validation\Validator as v;

class JobsController extends BaseController{
    public function getJobAddAction($request){


        if ($request->getMethod() == 'POST'){
            $postData=$request->getParsedBody();
            $jobValidator = v::key('title', v::stringType()->notEmpty())
                    ->key('description', v::stringType()->notEmpty());

            try{
                //$jobValidator->validate($postData); //solo devuelve true o false.
                $jobValidator->assert($postData); //valida similar a validate pero devuelve datos

                $job = new Job();
                $job->title =  $postData['title'];
                $job->description = $postData['description'];
                $job->save();
                
            }catch(\Exception $e){
                var_dump($e->getMessage());
            }




        }

        //include '../views/addJob.php';
        return $this->renderHTML('addJob.twig');
    }
}


?>