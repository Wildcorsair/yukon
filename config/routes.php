<?php

use Yukon\Core\App\Router;

Router::get('/', function() {
    echo 'Home Page';
});

Router::get('/users', 'User\UserController@index');
Router::get('/users/{id}', 'User\UserController@show');
