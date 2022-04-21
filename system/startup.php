<?php



function autoLoad($class){
    $file = SYSTEM . str_replace('\\', '/', $class) . '.php';
    if(file_exists($file)){
        require_once $file;

    }
    else {
        throw new Exception(sprintf('Class { %s } not Found ', $class));
    }
}

spl_autoload_register('autoLoad');

// Helper

require_once 'Helper/helper.php';

$request = new Http\Request();
$response = new Http\Response();