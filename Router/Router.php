<?php


$router->get('/tasks', 'TaskController@index');
$router->get('/tasks/:userId', 'TaskController@getByUser');
$router->delete('/tasks', 'TaskController@delete')->setAuth(true);
$router->post('/tasks', 'TaskController@add')->setAuth(true);
$router->put('/tasks/:updatedTask', 'TaskController@update')->setAuth(true);


$router->get('/section', 'SectionController@index');
$router->get('/section/:userId', 'SectionController@index');
$router->post('/section', 'SectionController@create')->setAuth(true);
$router->delete('/section',  'SectionController@delete')->setAuth(true);
$router->put('/section',  'SectionController@update')->setAuth(true);




// $router->get('/user', 'UserController@index');
$router->get('/user/:userId', 'UserController@getUserById')->setAuth(true);
$router->post('/user', 'UserController@create');
$router->put('/user', 'Auth/LoginAuthController@login');
$router->post('/refresh','Auth/RefreshTokenController@refreshToken');
$router->get('/', function() {
    echo 'Welcome ';
});