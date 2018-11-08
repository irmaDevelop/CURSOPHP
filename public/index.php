<?php
//creamos el punto en donde siempre queremos que entren los usuarios.
ini_set('display_errors' , 1);
ini_set('display_starup_errors',1);
error_reporting(E_ALL);//Constante indica ... TODOS LOS ERRORES

//add common code 
require_once '../vendor/autoload.php';

session_start();//hace que exista una sesion que no es necesariamente estar logeados.

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;
use Zend\Diactoros\Response\RedirectResponse;

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
    'action'     => 'getJobAddAction',
    'auth'       => true
]);

//se crea un post, para que reciba la informacion que se esta ingresando en el formulario
$map->post('saveJobs', '/jobs/add',[
    'controller' => 'App\Controllers\JobsController',
    'action'     => 'getJobAddAction'
]);


$map->get('addProjects', '/projects/add',[
    'controller' => 'App\Controllers\ProjectsController',
    'action'     => 'getProjectAddAction',
    'auth'       => true
]);

//se crea un post, para que reciba la informacion que se esta ingresando en el formulario
$map->post('saveProjects', '/projects/add',[
    'controller' => 'App\Controllers\ProjectsController',
    'action'     => 'getProjectAddAction'
]);

$map->get('addUsers', '/users/add',[
    'controller' => 'App\Controllers\UsersController',
    'action'     => 'getAddUser',
    'auth'       => true
]);

//se crea un post, para que reciba la informacion que se esta ingresando en el formulario
$map->post('saveUsers', '/users/save',[
    'controller' => 'App\Controllers\UsersController',
    'action'     => 'postSaveUser',
    'auth'       => true
]);

$map->get('loginForm', '/login',[
    'controller' => 'App\Controllers\AuthController',
    'action'     => 'getLogin'
]);

$map->get('logout', '/logout',[
    'controller' => 'App\Controllers\AuthController',
    'action'     => 'getLogout'
]);


$map->post('auth', '/auth',[
    'controller' => 'App\Controllers\AuthController',
    'action'     => 'postLogin'
]);

$map->get('admin', '/admin',[
    'controller' => 'App\Controllers\AdminController',
    'action'     => 'getIndex',
    'auth'       => true
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


    $needsAuth=$handlerData['auth'] ?? false; //si el valor de auth no esta definido ponle false
    $sessionUserId = $_SESSION['userId'] ?? null;

    if($needsAuth && !$sessionUserId){
        $controllerName = 'App\Controllers\AuthController';
		$actionName = 'getLogout' ;
    }


    //queremos que controller sea una nueva instancia de IndexController
    //php puede interpretar una cadena como si fuera el nombre de una clase
    $controller  = new $controllerName;
    //ahora a la clase controller le decimos ejecuta un metodo de esa clase
    $response = $controller->$actionName($request); // ejecuta un metodo baso en la cadena
    //require $route->handler;
    //var_dump($route->handler);
    foreach($response->getHeaders() as $name => $values){
        foreach($values as $value){
            header(sprintf('%s:  %s', $name, $value), false);
        }
    }
    http_response_code($response->getStatusCode());// establece cual es el codigo de respuesta 200 es el mas comun not found 404
    echo $response ->getBody();
}
    

// $route = $_GET['route'] ?? '/';

// if ($route=='/'){
//     require '../index.php';
// }elseif($route=='addJob'){
//     require '../addJob.php';
// }


?>