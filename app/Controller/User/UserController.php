<?php

namespace Yukon\Controller\User;

class UserController
{
    public function __construct()
    {
        echo 'This is User controller<br>';
    }

    public function index()
    {
        echo 'Show Users<br>';
    }

    public function show($id)
    {
        echo 'Show User: ' . $id . '<br>';
    }

    public function create()
    {
        echo 'Create User<br>';
    }

    public function edit($id)
    {
        echo 'Edit User: ' . $id . '<br>';
    }

    public function update($id)
    {
        echo 'Update User: ' . $id . '<br>';
    }

    public function delete($id)
    {
        echo 'Delete User: ' . $id . '<br>';
    }
}
