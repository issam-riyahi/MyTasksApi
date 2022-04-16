<?php


$router->get('/tasks', 'TaskController@index');
$router->get('/tasks/:userId', 'TaskController@getByUser');
$router->delete('/tasks', 'TaskController@delete');
$router->post('/tasks', 'TaskController@add');
$router->put('/tasks/:updatedTask', 'TaskController@update');


$router->get('/section', 'SectionController@index');
$router->get('/section/:userId', 'SectionController@index');
$router->post('/section', 'SectionController@create');
$router->delete('/section',  'SectionController@delete');
$router->put('/section',  'SectionController@update');




$router->get('/user', 'UserController@index');
$router->get('/user/:userId', 'UserController@byUser');
$router->get('/', function() {
    echo 'Welcome ';
});