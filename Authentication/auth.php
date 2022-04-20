<?php

require '../config.php';
require_once SYSTEM . 'startup.php';
require_once CONTROLLERS . 'UserController.php';
require_once 'generateJwt.php';
$request = new Http\Request();
$response = new Http\Response();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// database connection will be here



$validCredentials = true;
$controller = new UserController();
$data = $controller->auth();
if(empty($data)){
    $validCredentials = false;
}

if($validCredentials){
    $payload = array(
        "iat" => $issued,
        "exp" => $expire,
        "iss" => $issuer,
        "data" => $data,
    );

    http_response_code(200);

    $jwt = generateJWT($payload, SECRET);

    echo json_encode(array("message" => "Login success", "jwt" => $jwt));
}
else{
    http_response_code(401);
    echo json_encode(array("message" => "Login failed."));
}

