<?php
namespace Auth;

use ValidateAuthenticat;

require 'config.php';
require_once SYSTEM . 'startup.php';
require_once CONTROLLERS . 'Auth/ValidateAuthenticat.php';


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 


$Controller = new ValidateAuthenticat();
$valide = $Controller->validateAuth();

if($valide){
    $Controller->response->sendStatus(200);
    $Controller->response->setContent(['message' => 'valide token'] );
}
else{
    $Controller->response->sendStatus(203);
    $Controller->response->setContent(['message' => 'valide token'] );
}
$Controller->response->render();

