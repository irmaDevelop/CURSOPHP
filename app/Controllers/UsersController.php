<?php
namespace App\Controllers;
use App\Models\User;
use Respect\Validation\Validator as v;

class UsersController extends BaseController{


    public function getAddUser(){
        return $this->renderHTML('addUser.twig');
    }

    public function postSaveUser($request){
        
        $responseMessage  = null;

        if ($request->getMethod() == 'POST'){
            $postData=$request->getParsedBody();
            $userValidator = v::key('email', v::stringType()->notEmpty())
                    ->key('password', v::stringType()->notEmpty());
                    //->key('logo', v::stringType()->notEmpty());
 
            try{
                //$jobValidator->validate($postData); //solo devuelve true o false.
                $userValidator->assert($postData); //valida similar a validate pero devuelve datos
                //$postData=$request->getParsedBody();

              
                $user = new User();
                $user->email =  $postData['email'];
                $user->password = password_hash($postData['password'], PASSWORD_DEFAULT);
                $user->save();

                $responseMessage = "saved";
            }catch(\Exception $e){
                $responseMessage=$e->getMessage();
            }
            var_dump($postData); 
        }

        //include '../views/addJob.php';
        //mandamos nuestro mensaje de error dentro de arreglo; 
        return $this->renderHTML('addUser.twig',[
            'responseMessage' => $responseMessage
        ]);
    }
}


?>