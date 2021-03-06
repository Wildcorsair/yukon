<?php

use Yukon\Core\App\Router;

Router::get('/', function() {
    echo 'Home Page';
});

Router::prefix('/admin')->group(function() {
    Router::get('/users', 'User\UserController@index');
    Router::post('/users', 'User\UserController@create');
    Router::get('/users/{id}', 'User\UserController@show');
    Router::put('/users/{id}', 'User\UserController@update');
    Router::delete('/users/{id}', 'User\UserController@delete');
});

Router::get('/posts', 'User\UserController@index');
