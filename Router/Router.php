<?php


$router->get('/tasks', 'TaskController@index');
$router->get('/tasks/:userId', 'TaskController@getByUser');
$router->delete('/tasks', 'TaskController@delete');
$router->post('/tasks', 'TaskController@add');
$router->get('/', function() {
    echo 'Welcome ';
});