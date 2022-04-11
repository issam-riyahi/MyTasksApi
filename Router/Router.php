<?php


$router->get('/tasks', 'TaskController@index');
$router->get('/tasks/:userId', 'TaskController@index');
$router->get('/tasks?sectionId' , 'TaskController@getTasksBySectionId' );
$router->get('/', function() {
    echo 'Welcome ';
});