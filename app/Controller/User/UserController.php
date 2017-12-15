<?php

namespace Yukon\Controller\User;

class UserController
{
    public function __construct()
    {
        echo 'This is User controller';
    }

    public function index()
    {
        echo 'Show Users';
    }

    public function show($id)
    {
        echo 'Show User: ' . $id;
    }

    public function edit($id)
    {
        echo 'Edit User: ' . $id;
    }
}
