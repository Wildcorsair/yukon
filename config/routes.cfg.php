<?php

return [
    '/users/{id}' => ['GET', 'User\UserController', 'show'],
    '/users/{id}/edit' => ['GET', 'User\UserController', 'edit'],
    '/users/{id}/edit/' => ['POST', 'User\UserController', 'update'],
    '/posts/{id}/comment/{commentId}/edit/' => ['GET', 'PostController', 'edit'],
    '/posts/{id}/comment/{commentId}/update/' => ['POST', 'PostController', 'edit'],
    '/' => ['GET', 'Controller', 'index'],
];
