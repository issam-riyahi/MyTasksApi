<?php 


    $scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    define('HTTP_URL', '/'. substr_replace(trim($_SERVER['REQUEST_URI'], '/'), '', 0 , strlen($scriptName)));


    define('SCRIPT', str_replace("\\" , '/' , rtrim(__DIR__ , '/')) . '/');
    define('SYSTEM' , SCRIPT . 'system/');
    define('MODELS' , SCRIPT . 'Application/Models/' );
    define('CONTROLLERS' , SCRIPT . 'Application/Controllers/' );

    define('DATABASE' , [
        'Port' => '',
        'Host' => 'localhost',
        'Username' => 'root' ,
        'password' => '',
        'Driver' => 'PDO',
        'Name' => 'toDo',


    ]);
