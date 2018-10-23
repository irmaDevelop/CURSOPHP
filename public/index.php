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

//$map->get('index', '/','../index.php');
$map->get('index', '/',[
    'controller' => 'App\Controllers\IndexController',
    'action'     => 'indexAction'
]);
$map->get('addJobs', '/jobs/add',[
    'controller' => 'App\Controllers\JobsController',
    'action'     => 'getJobAddAction'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request); //hacemos la prueba final

function printElement($element){
    //contenido de la funcion
  
    //if ($element->visible == false){
    //  return;
    //}
  
    echo '<li class="work-position">';
    echo '<h5>' . $element->title . '</h5>';
    echo '<p>' . $element->description . '</p>';
    echo '<p>' . $element->getDurationAsString() . '</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>'; 
  }


if(!$route){
    echo 'No route';
}else{
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];
    //queremos que controller sea una nueva instancia de IndexController
    //php puede interpretar una cadena como si fuera el nombre de una clase

    $controller  = new $controllerName;
    //ahora a la clase controller le decimos ejecuta un metodo de esa clase
    $controller->$actionName(); // ejecuta un metodo baso en la cadena
    //require $route->handler;
    //var_dump($route->handler);
}
    




// $route = $_GET['route'] ?? '/';

// if ($route=='/'){
//     require '../index.php';
// }elseif($route=='addJob'){
//     require '../addJob.php';
// }


?>