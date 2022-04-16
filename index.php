<?php 
require 'config.php';

require_once SYSTEM . 'startup.php';
require_once CONTROLLERS . 'TaskController.php';
use Router\Router;

// dd($GLOBALS);

$request = new Http\Request();
$response = new Http\Response();


$response->setHeader("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept"); 
// $response->setHeader("Access-Control-Allow-Origin: *"); 
// $response->setHeader("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept");
// $response->setHeader("Content-Type: application/json; charset=UTF-8");
// $response->setHeader('Vary: http://localhost:3000');
$router = new Router($request->getUrl(), $request->getMethod());

// var_dump($router->getRouter());
require 'Router/Router.php';
// dd(class_exists('Controllers/TaskController'));

$router->run();

// dd($router->getMatchRouter());
function dd($parm){
    echo '<pre>';
    var_dump($parm);
    echo '</pre>';
}

$response->render();