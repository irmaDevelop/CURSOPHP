<?php
namespace App\Controllers;
use App\Models\Job;
use Respect\Validation\Validator as v;

class JobsController extends BaseController{
    public function getJobAddAction($request){
        
        $responseMessage = null;


        if ($request->getMethod() == 'POST'){
            $postData=$request->getParsedBody();
            $jobValidator = v::key('title', v::stringType()->notEmpty())
                    ->key('description', v::stringType()->notEmpty());
                    //->key('logo', v::stringType()->notEmpty());
 
            try{
                //$jobValidator->validate($postData); //solo devuelve true o false.
                $jobValidator->assert($postData); //valida similar a validate pero devuelve datos
                //$postData=$request->getParsedBody();

                $files = $request->getUploadedFiles();
                $logo = $files['logo'];
                if($logo->getError()== UPLOAD_ERR_OK){
                    $fileName = $logo->getClientFileName();
                    $logo->moveTo("uploads/$fileName"); 
                    $ruta = "uploads/$fileName";    
                }

              
                $job = new Job();
                $job->title =  $postData['title'];
                $job->description = $postData['description'];
                $job->logo = $ruta;
                $job->save();

                $responseMessage = "saved";
            }catch(\Exception $e){
                $responseMessage=$e->getMessage();
            }
            var_dump($postData); 
        }

        //include '../views/addJob.php';
        //mandamos nuestro mensaje de error dentro de arreglo:
        return $this->renderHTML('addJob.twig',[
            'responseMessage' => $responseMessage
        ]);
    }
}


?>