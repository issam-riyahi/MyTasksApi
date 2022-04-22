<?php


$router->get('/tasks', 'TaskController@index')->setAuth(true);
$router->get('/tasks/:userId', 'TaskController@getByUser')->setAuth(true);
$router->delete('/tasks', 'TaskController@delete')->setAuth(true);
$router->post('/tasks', 'TaskController@add')->setAuth(true);
$router->put('/tasks/:updatedTask', 'TaskController@update')->setAuth(true);


$router->get('/section', 'SectionController@index')->setAuth(true);
$router->get('/section/:userId', 'SectionController@index');
$router->post('/section', 'SectionController@create');
$router->delete('/section',  'SectionController@delete');
$router->put('/section',  'SectionController@update');




$router->get('/user', 'UserController@index');
// $router->get('/user/:userId', 'UserController@byUser');
$router->post('/user', 'UserController@create');
$router->get('/', function() {
    echo 'Welcome ';
});