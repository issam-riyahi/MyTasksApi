<?php 
require 'config.php';

require_once SYSTEM . 'startup.php';
require_once CONTROLLERS . 'TaskController.php';
// require_once AUTHENTICATION . 'validateJwt.php';
use Router\Router;

// dd($GLOBALS);




$response->setHeader("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept"); 
// $response->setHeader("Access-Control-Allow-Origin: *"); 
// $response->setHeader("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: X-Requested-With, Authorization,  Content-Type, Accept");


$router = new Router($request->getUrl(), $request->getMethod());

require 'Router/Router.php';
// $jwt = getBearerToken();
// $checkAuth = validateJWT($jwt, SECRET);

// if($checkAuth){
//     $router->run();
    
// }
// else{

//     $response->sendStatus(401);
//     $response->setContent(['message'=> 'Unauthorized']);
//     // $header = $response->getHeader();
//     // var_dump($header);
    

// }
$response->render();