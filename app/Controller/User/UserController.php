<?php

namespace Yukon\Controller\User;

class UserController
{
    public function __construct()
    {
        echo 'This is User controller';
    }

    public function edit($id)
    {
        echo 'Edit User: ' . $id;
    }
}
