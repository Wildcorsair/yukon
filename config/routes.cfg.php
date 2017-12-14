<?php

//TODO: Problem with the equal routes because array can not to have the same keys.
return [
    '/users/{id}/' => ['GET', 'User\UserController', 'show'],
    '/users/{id}/edit/' => ['GET', 'User\UserController', 'edit'],
    '/users/{id}/update/' => ['POST', 'User\UserController', 'update'],
    '/posts/{id}/comment/{commentId}/edit/' => ['GET', 'Post\PostController', 'edit'],
    '/posts/{id}/comment/{commentId}/update/' => ['POST', 'Post\PostController', 'update'],
    '/' => ['GET', 'Controller', 'index'],
];
