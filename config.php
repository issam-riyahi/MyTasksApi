<?php 


    $scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    define('HTTP_URL', '/'. substr_replace(trim($_SERVER['REQUEST_URI'], '/'), '', 0 , strlen($scriptName)));


    define('SCRIPT', str_replace("\\" , '/' , rtrim(__DIR__ , '/')) . '/');
    define('SYSTEM' , SCRIPT . 'system/');
    define('MODELS' , SCRIPT . 'Application/Models/' );
    define('CONTROLLERS' , SCRIPT . 'Application/Controllers/' );
    define('AUTHENTICATION' , SCRIPT . 'AUTHENTICATION/');

    
    define('DATABASE' , [
        'Port' => '',
        'Host' => 'localhost',
        'Username' => 'root' ,
        'password' => '',
        'Driver' => 'PDO',
        'Name' => 'toDo',


    ]);

    define('SECRET', '04ff5daadaa987fc26858770138ca559940fb528015d1da047264870ce7f7113');


    $issued = time();
    $expire = $issued  + (60);
    $issuer = "http://localhost:3001"; 
