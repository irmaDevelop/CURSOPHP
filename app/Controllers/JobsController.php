<?php
namespace App\Controllers;

class JobsController{
    public function getJobAddAction(){
        if (!empty($_POST)){
            $job = new Job();
            $job->title =  $_POST['title'];
            $job->description = $_POST['description'];
            $job->save();
        
        }
    }
}

?>