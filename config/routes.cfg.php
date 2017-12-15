<?php

use Yukon\Core\App\Router;

// return [
//     '/users/{id}/' => ['GET', 'User\UserController', 'show'],
//     '/users/{id}/edit/' => ['GET', 'User\UserController', 'edit'],
//     '/users/{id}/update/' => ['POST', 'User\UserController', 'update'],
//     '/posts/{id}/comment/{commentId}/edit/' => ['GET', 'Post\PostController', 'edit'],
//     '/posts/{id}/comment/{commentId}/update/' => ['POST', 'Post\PostController', 'update'],
//     '/' => ['GET', 'Controller', 'index'],
// ];

Router::get('/', function() {
    echo 'Home Page';
});

Router::get('/users', 'User\UserController@index');
Router::get('/users/{id}', 'User\UserController@show');
