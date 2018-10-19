<?php
//creamos el punto en donde siempre queremos que entren los usuarios.
ini_set('display_errors' , 1);
ini_set('display_starup_errors',1);
error_reporting(E_ALL);//Constante indica ... TODOS LOS ERRORES

//add common code 
require_once '../vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;
//use App\Models\Job;
//use App\Models\Project;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'curso_php',
    'username'  => 'root',
    'password'  => 'tarapoto',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

// las lineas siguientes las trae desde la socumentacion de /aura/router de packagist
$routerContainer = new RouterContainer();
$map = $routerContainer->getMap(); //estructura que define que ruta lleva a que cosa
//var_dump($map);
//$map->get('blog.read', '/blog/{id}',
$map->get('index', '/','../index.php');
$map->get('addJobs', '/jobs/add','../addJobs.php');

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request); //hacemos la prueba final

if(!$route){
    echo 'Route not founded';
}
    var_dump($route);




// $route = $_GET['route'] ?? '/';

// if ($route=='/'){
//     require '../index.php';
// }elseif($route=='addJob'){
//     require '../addJob.php';
// }


?>