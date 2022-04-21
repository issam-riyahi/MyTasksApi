<?php

require '../config.php';
require_once SYSTEM . 'startup.php';
require_once CONTROLLERS . 'UserController.php';
require_once 'generateJwt.php';


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$validCredentials = true;
$controller = new UserController();
$userId = $controller->request->post()['userId'];
$data = $controller->getUserById($userId);
 
if(empty($data->row)){
    $controller->response->sendStatus(400);
    $controller->response->setContent(['message' => 'invalid entries']);
}
else{
    $payload = array(
        "iat" => $issued,
        "exp" => $expire,
        "iss" => $issuer,
        "data" => $data->row,
    );


    $jwt = generateJWT($payload, SECRET);
    $responseMessage = ["message" => "refresh Success", "jwt" => $jwt];
    $controller->response->sendStatus(200);
    $controller->response->setContent($responseMessage);
}
$controller->response->render();