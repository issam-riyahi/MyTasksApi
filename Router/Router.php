<?php


$router->get('/tasks', 'TaskController@index');
$router->get('/tasks/:userId', 'TaskController@getByUser');
$router->delete('/tasks', 'TaskController@delete');
$router->post('/tasks', 'TaskController@add');


$router->get('/section', 'SectionController@index');
$router->get('/user', 'UserController@index');
$router->get('/user/:userId', 'UserController@byUser');
$router->get('/', function() {
    echo 'Welcome ';
});