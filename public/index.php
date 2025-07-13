<?php
use Core\Session;
use Core\ValidationException;

session_start();


const BASE_PATH = __DIR__ . '/../' ;

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function($class){

    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    
    require basePath("{$class}.php");
});

require basePath('bootstrap.php');

$router = new Core\Router();

$routes = require basePath('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try{
    $router->route($uri, $method);
} catch(ValidationException $exception){
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}

$router->route($uri, $method);

Session::unflash();

//$id = ($_GET['id']);
//$query = "select * from notes where id = :id ";

//$post = $db->query($query, [':id' => $id])->fetch();