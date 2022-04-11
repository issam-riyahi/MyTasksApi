<?php 
require 'config.php';

require_once SYSTEM . 'startup.php';
require_once CONTROLLERS . 'TaskController.php';
use Router\Router;

// dd($GLOBALS);

$request = new Http\Request();
$response = new Http\Response();


$response->setHeader('Access-Control-Allow-Origin: *');
$response->setHeader("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
$response->setHeader('Content-Type: application/json; charset=UTF-8');

$router = new Router($request->getUrl(), $request->getMethod());

// var_dump($router->getRouter());
require 'Router/Router.php';
// dd(class_exists('Controllers/TaskController'));

$router->run();

dd($request->get());
function dd($parm){
    echo '<pre>';
    var_dump($parm);
    echo '</pre>';
}

$response->render();