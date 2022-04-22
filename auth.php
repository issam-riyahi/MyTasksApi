<?php
namespace Auth;

use LoginAuthController;

require 'config.php';
require_once SYSTEM . 'startup.php';
require_once CONTROLLERS . 'Auth/LoginAuthController.php';


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 


$Controller = new LoginAuthController();
$Controller->login();
$Controller->response->render();

